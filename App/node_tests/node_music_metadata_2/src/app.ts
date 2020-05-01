import fs, { Dirent } from "fs";
import path from "path";
import * as mm from "music-metadata";
import * as util from "util";

class ScanDir {

  public static extentions = ["mp3", "flac"];

  public static readDir(basePath: string, recursive: boolean = false): string[] {

    let filesListing: string[] = [];

    fs.readdirSync(basePath, {withFileTypes : true})
      .forEach((file: Dirent) => {
        if (file.isDirectory() && recursive) {
          filesListing = filesListing.concat(this.readDir(basePath + file.name+ path.sep));
        }
        const ext = file.name.split(".").pop();
        if(ext && ScanDir.extentions.indexOf(ext) === -1) {
          // console.log(ext+" - "+file.name);
          return;
        }

        filesListing.push(basePath + file.name);
    });

    return filesListing;
  }

  public static async getMetadata(files: string[]) {
    files.forEach(async element => {
      let meta = await ScanDir.extractMetadata(element);
      console.log(meta);
    });
    
  }


  public static extractMetadata(file: string) {
    return mm.parseFile(file).then((metadata :mm.IAudioMetadata) => {
      console.log('readdd');
      return metadata;
    });
  }

}

const testFolder = "C:\\Users\\Kris\\Music\\";

const res = ScanDir.readDir(testFolder);
//console.log(res);
//console.log(res.length);
const res2 = ScanDir.readDir(testFolder, true);

console.log('start');
ScanDir.getMetadata(res2);
console.log('start');
//console.log(res2);