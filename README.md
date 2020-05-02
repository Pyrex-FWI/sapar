
# Sapar personal project

```
├── Bundle
├── Component
│   ├── MediaFileIndexer   # ??
│   ├── SfvChecker         #Check if a release is complete
│   └── id3                #ID3 Tag Reader
└── Console                #
    ├── MovieUnrar         #..
    └── ReleaseDispatcher  #Make group of releases
```


#### How add features


##### Run projects

`docker-compose  -f App/ReleaseDispatcherUi/docker-compose.yml  up`
`docker-compose  -f App/ReleaseDispatcherUi/docker-compose.yml -f App/NodeFolderApi/docker-compose.yml up`

#### Commit / Push / Dispatch to readOnlyrepositories [(MonorepoBuilder)](https://github.com/Symplify/MonorepoBuilder)

- vendor/bin/monorepo-builder release v0.12.5 --dry-run
- vendor/bin/monorepo-builder release v0.12.5
- vendor/bin/monorepo-builder split

#### Related repositories

- https://gitlab.com/Pyrex-FWI/sfv-checker.git
- https://gitlab.com/Pyrex-FWI/movie-unrar.git
- https://gitlab.com/Pyrex-FWI/release-dispatcher.git
