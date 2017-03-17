[![MIT license](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)
![Packagist][packagist]

[packagist]: https://img.shields.io/packagist/v/mindscreen/flow-cachebreak.svg


# Cache Breaking for Flow resources 

This package provides a ViewHelper that adds a cache breaking string to resource URIs. The cache breaking string
can be updated with a CLI command.

## Recommended usage

Replace the default Flow resource.uri ViewHelper with the ViewHelper provided by this package for all resources
  that should get cache breaking capability:
  
```html
<link rel="stylesheet" href="{cb:uri.resource(path: 'Build/Styles/Style.css', package: 'My.Package')}" />
```

You can set far future expires headers for these resources, as the the ViewHelper will add a cache breaking GET 
parameter to the resource URI.
 
The GET parameter is only updated when you explicitly flush the Mindscreen_Flow_CacheBreak cache.
`./flow flow:cache:flush` will not clear this cache, as it is persistent.

As an alternative to cache flushing, you can use the command `./flow cachebreak:update` (which does the same thing
basically).

You should execute the `cachebreak:update` command (or the cache flushing) during every deployment (for example
as part of your Surf Deployment).
