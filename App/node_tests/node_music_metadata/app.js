
const mm = require('music-metadata');
const util = require('util')
 
mm.parseFile('C:\\Users\\Kris\\Music\\Black_T-Etchatchawa_(Feat_DJ_Sebb)-WEB-FR-2019-OND\\01-black_t-etchatchawa_(feat_dj_sebb).mp3')
  .then( metadata => {
    console.log(util.inspect(metadata, { showHidden: false, depth: null }));
  })
  .catch( err => {
    console.error(err.message);
  });