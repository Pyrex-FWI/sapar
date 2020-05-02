<?php

namespace Sapar\Console\ReleaseDispatcher;

/**
 * Class AlbumReleaseDirectory
 */
class AlbumReleaseDirectory extends AbstractReleaseDirectory implements \Serializable, \JsonSerializable
{
    private $regex = [
        //'/^(?P<artist>[\d\w]*)\-\-?(?<album>[\w\d\_\(\)\.]*)(?P<extra>\-?\(.*\))?\-?(?P<type>\-?cd|single|repack)?(?P<source>\-web)?(-?(?P<lang>fr))?\-(?P<year>\d*)\-(?P<group>\w*)$/mi'
        '/-?(\dcd)?(?P<type>(single|BONUS_TRACKS))?-?(?P<source>WEB)?-?(?P<lang>FR)?-(?P<year>\d*)-(?P<group>\w*)$/',
    ];
    private $lang;
    private $source;

    public function isValid()
    : bool
    {
        $this->prepare();

        return $this->getValid() === true ?: false;
    }

    public function prepare()
    : ReleaseDirectoryInterface
    {
        if ($this->getValid() !== null) {
            return $this;
        }
        foreach ($this->regex as $regex) {
            if (0 < preg_match($regex, $this->path, $matches)) {
                $this->setGroup($matches['group']);
                $this->setYear($matches['year']);
                $this->lang   = $matches['lang'];
                $this->source = $matches['source'];
                $this->setValid(true);
                break;
            }
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

  /**
   * String representation of object
   *
   * @link  https://php.net/manual/en/serializable.serialize.php
   * @return string the string representation of the object or null
   * @since 5.1.0
   */
  public function serialize()
  {
    $data = $this->toArray();

    return $this->serialize($data);
  }

  /**
   * Constructs the object
   *
   * @link  https://php.net/manual/en/serializable.unserialize.php
   * @param string $serialized <p>
   *                           The string representation of the object.
   *                           </p>
   * @return void
   * @since 5.1.0
   */
  public function unserialize($serialized)
  {
    $data = unserialize($serialized);
    $this->path = $data['path'];
    $this->fileInfo = new \SplFileInfo($data['path']);
    $this->setGroup($data['group']);
    $this->setYear($data['year']);
    $this->lang   = $data['lang'];
    $this->source = $data['source'];
  }

  /**
   * Specify data which should be serialized to JSON
   *
   * @link  https://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   * @since 5.4.0
   */
  public function jsonSerialize()
  {
    return $this->toArray();
}

  /**
   * @return array
   */
  protected function toArray(): array
  {
    $data = [
      'group' => $this->getGroup(),
      'lang' => $this->getLang(),
      'name' => $this->getName(),
      'year' => $this->getYear(),
      'path' => $this->path,
    ];
    return $data;
  }
}
