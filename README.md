foglcz's sandbox
================
This is an sandbox, which I, @foglcz, use. It contains several addons:

- it's Dibi based
- it contains composer.json and appropiate gitignores
- the authenticator is mcrypt based - there's no cheap md5's, there's no static salts
- the way of working with models is easier - with use of dibi of course.

And mainly - it's tested and proven by time.

--------------------------------------------------------------------------------

Default usage:

- $ git clone git@github.com:foglcz/sandbox.git
- $ composer install

**DANGER:** The composer.json specifies dev-master branch of nette. I tried,
I honestly tried, failed and cried, the stable version of nette. No matter I did,
the sandbox did NOT work with the stable version (serious #wtf). So here we are,
using latest development branch, which can be broken without previous alert. 
Rest assured, once new version is out, I shall update composer.json and make this
again working.

My heart is crying writing this, as there's no other way.

--------------------------------------------------------------------------------

If you don't like something, try pull request.
License for new additions is New BSD. The original sandbox license is unchanged.