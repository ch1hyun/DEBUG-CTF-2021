# CTFd API endpoint
host = "https://ctf.skhudebug.xyz"

# CTFd API token
api_token = "4115b21aea36080ba59ca581a304e82cc004b5bcb52f8a959a5a3eb887936875"

# How frequently to check for new solves
poll_period = 10

# Discord webhook url
webhook_url = "https://discordapp.com/api/webhooks/812728546069315645/lsbdVO3JRzNy6O_cUmhvSD7ekS16HsRX-fmHyALWt4rGJ2F7CFdXdTNg5lXRWe3DbnRK"

# Available template variables are:
# User Name: {user_name}
# Challenge Name: {chal_name}
first_blood_announce_string = "Congratulations to **{user_name}** for First :drop_of_blood: on **{chal_name}**"

# To be used with announce_all_solves
solve_announce_string = "**{user_name}** just solved **{chal_name}**!"

# Whether or not to announce all solves as well as first bloods
announce_all_solves = False
