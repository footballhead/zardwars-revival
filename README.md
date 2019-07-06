# ZardWars Revival

ZardWars encyclopedia currently hosted at http://zardwarsrevival.nfshost.com/

## Deploying

Requires PHP 5.6.

Copy the following to your host of choice:

* `encyclopedia/`
* `images/`
* `pages/`
* `screenshots/`
* `*.html`
* `*.php`
* `style.css`
* `sitemap.xml`

## Developing with Docker

A Dockerfile is provided for rapid development. To build:

    docker build -t zardwars-revival .

To run:

    docker run --rm --name zardwars-revival -p 80:80 zardwars-revival

## License

* All code, text files, and styling are public domain.
* All in-game screenshots and images belong to Artix Entertainment.
