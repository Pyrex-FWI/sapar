import audio_metadata
import json
import glob
from pathlib import Path

#json.dump(tags)

class ScanDir:
    def read(self, file):
        metadata = audio_metadata.load(file)

        tags = metadata.tags
        print(f"End of function for {file}")

        return (tags)

s = ScanDir()
result = s.read('01-black_t-etchatchawa_(feat_dj_sebb).mp3')

print(type(result))
print(result)

p = Path('c:/')


[x for x in p.iterdir() if x.is_dir()]
