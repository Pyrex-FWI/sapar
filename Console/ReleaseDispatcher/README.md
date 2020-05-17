## ReleaseDispatcher

### Goals:

- Organize release directories according a configured pattern

#### Configuration sample

```
release_dispatcher:
  dispatcher:
    format: 'target~"/_"~release.getGroup()~"/"~release.getYear()~"/"~release.getName()'
    output: ~
```

Run tests:

#### Run with docker

```
sudo docker run -t --rm \
-v "/volume3/temp/_scripts/sapar/Console/ReleaseDispatcher/.release-dispatcher.yml:/usr/src/app/.release-dispatcher.yml" -v /volume3/temp/:/volume3/temp/ yemistikris/sapar-release-dispatcher \
/usr/src/app/release-dispatcher run -vvv
```


##### Run tests

`make tests`