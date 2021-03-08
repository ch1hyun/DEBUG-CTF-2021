FROM ubuntu:14.04
MAINTAINER your_name "email@gmail.com"
RUN apt-get update -y
RUN apt-get install -y python3-pip python3-dev build-essential
COPY . /app
WORKDIR /app
RUN pip3 install flask
ENTRYPOINT ["python3"]
CMD ["app.py"]
