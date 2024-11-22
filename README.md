<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Requirements
In order to setup this project into your local machine. The following should be set up in your local environment:
- [Composer](https://getcomposer.org/download/)
- [Yarn](https://classic.yarnpkg.com/lang/en/docs/install/)
- [Webhook.site CLI](https://docs.webhook.site/cli.html#nodejs)

## Setup
Once the the requirements are installed, you should run `composer install` in the repository's directory to install dependencies for **Laravel**

Then, go to the directory of the repo and run `composer run post-root-package-install` to setup the env file for your local setup.

Next, run composer run `post-create-project-cmd` to run the final setup for Laravel.

After setting up the backend, run `yarn install` to install dependencies for the frontend

Finally, you can now run `composer run dev` to access the app at http://127.0.0.1:8000/ from your browser

## Running Tests

To run tests using Pest, run `php artisan test` in your console

## Webhook Calls
We can simulate webhook calls using `webhooks.site`

The id for this specific repo is: https://webhook.site/#!/view/bc10ed7b-e68f-4811-9108-8abe20de9e28

Run the following to direct POST requests from out Webhook.site instance to your local development setup (Make sure local is running in http://127.0.0.1:8000/):
```
whcli forward --token=bc10ed7b-e68f-4811-9108-8abe20de9e28 --target=http://localhost:8000/callback
```

Then to send a test POST request to our webhook route, run this **CURL** command in your console:
```
curl -X POST 'https://webhook.site/bc10ed7b-e68f-4811-9108-8abe20de9e28?secret_key=secret' \
        -H 'content-type: application/json' \
        -d $'{ "status": "success", "order_id": 12345 }'
```

## Checking Logs

You can check logs under `storage/logs/laravel.log` file
