# The application form for psychological experiment
That is the online form for psychological experiment which enables experimenters to recieve applications from the participants. Also experimenters can regsiter new experiment in this platform, and participants are able to choose some experiments by registering their available dates for participation in some experiments.

# Requirement
- PHP (>=6.0)
- Node
- Heroku

# Setup
- git clone https://github.com/anoiro/portfolio_1.git
- cd portfolio_1
- composer install
- heroku run 'php artisan migrage --seed'

# Usage
## In case you are experimenter
- Access to 'http://experimentapplicationform.herokuapp.com/exper/register'
- Log in as a demo user
    - E-Mail Address: 'experimenter1@com'
    - Password: 'experimenter1'

## In case you are participant
- Access to 'http://experimentapplicationform.herokuapp.com/user/register'
- Log in as a demo user
    - E-Mail Address: 'participant1@com'
    - Password: 'participant1'

# DEMO
now in preparing

# Note
- In case you are logged in as an experimenter, the extension of image file is needed to be jpeg.
