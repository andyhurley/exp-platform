# Experimental Platform for Health Promotion

This web-tool is an under-development 'experimental platform', intended to provide a platform
for the preliminary development and	testing of interactive health topic modules.

The initial platform has been based on the website developed for NHS Wales'
[Champions for Health](http://www.championsforhealth.wales.nhs.uk) campaign.

## Requirements

* CakePHP >= 2.4

## Authors

The platform has been built and designed by:

* Andy Hurley, [It's All Nice](http://itsallnice.co.uk)
* David Burton, [Doive Designs](http://www.doivedesigns.co.uk)

## Acknowledgements

Many thanks for the ideas, contributions and guidance from the team at Public Health Wales, particularly:

* Dr. Hugo van Woerden, Director of Innovation and Development, Public Health Wales
* Chris Garlick, Workplace Health Practitioner, Healthy Working Wales, Public Health Wales

This platform makes use of the following external plugins, images and components. It couldn't
be done without these guys!

* [Bootstrap](http://getbootstrap.com/)
* [BoostCake - Bootstrap Plugin for CakePHP](http://slywalker.github.io/cakephp-plugin-boost_cake/)
* [MenuBuilder](http://github.com/torifat/cake-menu_builder/)
* [PHP OpenID library by JanRain, Inc](http://janrain.com/openid-enabled/)
* [JpGraph](http://jpgraph.net/)
* [AuthButtons](https://github.com/intridea/authbuttons)
* [Oxygen Icons](http://www.oxygen-icons.org/)
* [Glyphicons](http://glyphicons.com/)

## Installation

These are only rough directions, as your configuration settings will be different to mine. Step 1 is the most important, as if CakePHP isn't set up and running correctly in your environment, then the experimental platform has no chance!

1. Install and set up a copy of CakePHP on your favourite webserver. Check that you can get the example Cake project working in your environment.
2. The experimental platform has been configured to run in an adjacent directory to CakePHP. Download the app directory from the GitHub repository, and place it next to your CakePHP directory.
3. Configure your webserver to point directly to the /app directory for your chosen domain name.
4. A database set up script can be found in the /DB Setup Scripts directory, called database-structure.sql. Create a database for the platform, then run this script to set up the necessary empty tables. You may also want to run the test-data.sql or extended-test-data.sql to set up some initial values for the health modules.
5. Next, remove the .default part of the filenames from /app/config/core.php.default, /app/config/database.php.default and /app/config/email.php.default, and add your personal configuration settings to these files that will work best with your webserver and mailserver configuration. Don't forget to change the salt and cipherSeed settings in the core.php file.
6. Open a browser, and head over to the domain name that you've told your webserver to listen to for the platform. You should now be seeing a shiny new experimental platform!

## License

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

### Additional restriction

An additional restriction has been applied to this software:

* Any data collected using this platform will be provided without charge (after being anonymised) to the
developers for research purposes.

Please get in touch for more detail regarding this additional restriction.
