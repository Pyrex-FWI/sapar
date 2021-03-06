# Changelog

All notable changes to this project will be documented in this file.

## Unreleased

- add package_alias_format to monorepo-builder.yaml to handle X.X.x version

## v5.1.3 - 2020-05-17 

- Update doc

## v5.1.2 - 2020-05-17

- Fix audiocore tests (fix namespace changes)

## v5.1.1 - 2020-05-16

- Add Contract/Core

## 5.1.0 - 2020-05-06

- Ajout du script d'attente wait-for-it
- Extraction de l'exposition des ports dans une fichier docker-compose unique.


## 5.0.0 - 2020-05-02

- Create release 0.13 for test
- Mise à jour de l'image docker
- Add Symfony4 and Symfony5 on Monorepo

## v0.12.9 - 2019-09-14

- [ReleaseDispatcher] - Allow serialize on AlbumReleaseDirectory for Api Json transformation

## v0.12.8 - 2019-09-13

- [NodeFolderApi] - Add method SaparFinder::getAlbumReleases()

## v0.12.7 - 2019-09-13

- [ReleaseDispatcherUI] - Add anglur8 tree/node component
- [NodeFolderApi] - Add slim php framework for Tree/node backend api

## v0.12.6 - 2019-09-09

- [ReleaseDispatcher] - Increase code coverage
- [ReleaseDispatcher] - Add test for ReleaseDispatcherInitCommand
- [ReleaseDispatcher] - Add test for ReleaseDispatcherCommand
- [ReleaseDispatcher] - add make commands container-rm-all and image-rm-all
- [ReleaseDispatcher] - Refacto ReleaseDirectoryInterface::valid() to ReleaseDirectoryInterface::prepare()
- [ReleaseDispatcher] - Fix issue on move AlbumReleaseDirectory with double slash
- [ReleaseDispatcher] - Re-organize makefile
- [ReleaseDispatcher] - Add xdebug extension for phpunit coverage
- [ReleaseDispatcher] - allow RELEASE_CONFIG_FILE env var for `.release-dispatcher.yml` map.
 
## v0.12.3 - 2019-07-14

- Ajout de docker-compose