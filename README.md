

![audio-core-entities PhpUnit](https://github.com/Pyrex-FWI/sapar/workflows/audio-core-entities%20PhpUnit/badge.svg)

![audio-core-entities Grump](https://github.com/Pyrex-FWI/sapar/workflows/audio-core-entities%20Grump/badge.svg)

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

### Pour faire un patch

- Modifier les source
- Mettre à jour le changelog
- Exécuter `vendor/bin/monorepo-builder release patch`
- Puis deployer le tout `vendor/symplify/monorepo-builder/bin/monorepo-builder split -v`


#### Commit / Push / Dispatch to readOnlyrepositories [(MonorepoBuilder)](https://github.com/Symplify/MonorepoBuilder)

- vendor/bin/monorepo-builder release v0.12.5 --dry-run
- vendor/bin/monorepo-builder release v0.12.5
- vendor/bin/monorepo-builder split

#### Related repositories

- https://gitlab.com/Pyrex-FWI/sfv-checker.git
- https://gitlab.com/Pyrex-FWI/movie-unrar.git
- https://gitlab.com/Pyrex-FWI/release-dispatcher.git
