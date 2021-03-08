from flask import Flask,request,session
from flask.templating import render_template
from werkzeug.utils import secure_filename
import os
import flag
import base64,random
import hashlib

ALLOWED_EXTENSIONS = set(['jpg', 'jpeg', 'png', 'gif', 'bmp', 'JPG', 'JPEG', 'PNG', 'GIF', 'BMP'])

app = Flask(__name__)
secret= os.urandom(24)

app.secret_key=secret

@app.route("/")
def index():

    if 'pwd' in session:
        return render_template('index.html')
    else:
        secret2= os.urandom(24)
        
        text=str(secret2).encode('utf-8')
        enc = hashlib.md5()
        enc.update(text)
        encText = enc.hexdigest()
        encText=encText+'/'

        session['pwd']=encText
    return render_template('index.html')


@app.route("/source")
def source():
    return render_template('source.html')

@app.route('/fileupload')
def upload():
    return render_template('fileupload.html')

@app.route("/upload",methods=['POST'])
def result():
    file = request.files['file']

    if file and allowed_file(file.filename):
        os.makedirs('/app/static/'+session['pwd'],exist_ok=True)
    else:
        return 'no allow'

    f=os.popen("sudo find /app/static/"+session['pwd']+" -name '"+file.filename+"' 2>/dev/null")
    line = f.readline()
    if line:
        return 'already exist in : '+line

    file.save(os.path.join('/app/static/'+session['pwd'], file.filename))
    return '<a href="static/'+session['pwd']+file.filename+'">'+'static/'+session['pwd']+file.filename+'</a>'

def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1] in ALLOWED_EXTENSIONS

if __name__=='__main__':
    app.run(debug=False,host='0.0.0.0')
