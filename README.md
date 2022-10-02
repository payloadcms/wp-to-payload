# Migrating from WP to Payload

Its' 2022 but all over Reddit, if someone asks for a headless CMS suggestion, WP is still one of the top comments. The Payload team has built headless WP sites for almost 7 years, and it certainly had its place, but its time is now over. Using it in a headless context is no longer relevant.

This repo shows why. It includes a WordPress site with a typical ACF usage example as well as how to replicate that exact same functionality in Payload. You can run both projects on your own machine to see the difference in developer experience for yourself.

### Running Payload

Here are the steps that you need to follow to get up and running with the copy of Payload in this repo. Make sure you have a local copy of MongoDB installed. Or, sign up for a free Mongo Atlas account and paste the connection string to your DB into your `.env` file.

1. `cd ./payload`
1. `cp .env.example .env` to make an environment file
1. `yarn`
1. `yarn dev`

### Running WordPress

For the WP demo, you'll need Docker installed. Once you have Docker, here are the steps to follow:

1. `cd ./wordpress`
1. `cp docker-compose.example.yml docker-compose.yml`
1. Make sure the Docker Compose configuration looks good and change it to suit your environment if necessary
1. `docker-compose up -d`
1. Go to `http://localhost:8000` and set up your website
1. Activate all plugins
1. Activate the `migrate-from-wordpress` theme

Once you've got both environments up and running, you should compare and contrast the code of each app and make up your own mind.

## Comparing GraphQL Queries

We've included a sample GraphQL query for both Payload and WP, and you can give each a test-run for yourself. Make sure to create some documents and play around in each admin panel before trying to query, because otherwise there won't be any content to query!

Payload's query can be found at `./payload/query.graphql` and you can use the GraphQL Playground at http://localhost:3000/api/graphql-playground to check it out.

WordPress' query can be found at `./wordpress/query.graphql` and you can use the GraphiQL page within the WP dashboard to play around.

#### Disclaimer

At Payload, we think that WordPress certainly does have a time and place, but we don't feel that its place is within the headless ecosystem. It just isn't built for it. But it's still perfectly valid for no-code solutions and small, budget-focused websites that only require an off-the-shelf theme. However, if you're building a custom JAMstack website, we feel strongly that there is no reason to use it over the likes of Payload or other more purpose-built headless CMS.



