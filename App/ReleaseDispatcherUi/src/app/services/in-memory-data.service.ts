import { Injectable } from '@angular/core';
import { InMemoryDbService } from 'angular-in-memory-web-api';

@Injectable({
  providedIn: 'root'
})
export class InMemoryDataService implements InMemoryDbService{

  createDb() {
    const nodes = [
      {
        "group": "OND",
        "lang": "FR",
        "name": "0060-Etoiles-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/0060-Etoiles-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "ENTiTLED",
        "lang": "FR",
        "name": "100_Remords-Le_feu_en_moi-WEB-FR-2019-ENTiTLED",
        "year": 2019,
        "path": "vfs://saparNas/100_Remords-Le_feu_en_moi-WEB-FR-2019-ENTiTLED"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "13_Original-Sous_La_Lune-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/13_Original-Sous_La_Lune-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "2s-Chacun_Son_Tour-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/2s-Chacun_Son_Tour-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "404Billy-Sombre_Fan-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/404Billy-Sombre_Fan-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "4Keus_Gang-Damdam-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/4Keus_Gang-Damdam-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "FR",
        "name": "7AC-De_Quoi_Ca_Parle-WEB-FR-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/7AC-De_Quoi_Ca_Parle-WEB-FR-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "A2P-Dans_Ses_Yeux-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/A2P-Dans_Ses_Yeux-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Abou_Debeing-Petit_De_La_Tess-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Abou_Debeing-Petit_De_La_Tess-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Abyllisse-Masque-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Abyllisse-Masque-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Admiral_T-Ghetto_Survivor_(Feat_Stonebwoy)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Admiral_T-Ghetto_Survivor_(Feat_Stonebwoy)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "YARD",
        "lang": "",
        "name": "Alborosie_meets_Roots_Radics-Dub_For_The_Radicals-CD-2019-YARD",
        "year": 2019,
        "path": "vfs://saparNas/Alborosie_meets_Roots_Radics-Dub_For_The_Radicals-CD-2019-YARD"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Al_Craigs_Soul_Revolution-Take_Me_to_the_Living_Rock-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Al_Craigs_Soul_Revolution-Take_Me_to_the_Living_Rock-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Alkpote-Lultime_Marche_(Les_Marches_De_Lempereur_Saison_3_-_Episode_10)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Alkpote-Lultime_Marche_(Les_Marches_De_Lempereur_Saison_3_-_Episode_10)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Alkpote-Purification_(Les_Marches_De_Lempereur_Saison_3_-_Episode_9)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Alkpote-Purification_(Les_Marches_De_Lempereur_Saison_3_-_Episode_9)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "Alva-Heterotopies-(PN009)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/Alva-Heterotopies-(PN009)-WEB-2019-ENSLAVE"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Alxksey-Enfant_Dechu-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Alxksey-Enfant_Dechu-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "Aly_Bass-Je_2_Societe-WEB-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/Aly_Bass-Je_2_Societe-WEB-FR-2019-H5N1"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Amel_Bent-Demain-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Amel_Bent-Demain-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "ANAHYS-Ti_Baba-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/ANAHYS-Ti_Baba-WEB-FR-2019-AZF"
      },
      {
        "group": "UTP",
        "lang": "FR",
        "name": "Anonymus-Sacrifices-FR-2019-UTP",
        "year": 2019,
        "path": "vfs://saparNas/Anonymus-Sacrifices-FR-2019-UTP"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Anthony_Le_Loup-Sous_La_Fenetre-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Anthony_Le_Loup-Sous_La_Fenetre-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "ANTO-Entre_Deux_Pages-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/ANTO-Entre_Deux_Pages-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Antoine_Sahler-Antoine_Sahler-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Antoine_Sahler-Antoine_Sahler-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Ashanti-The_Road-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Ashanti-The_Road-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Atim-Tout_Peter-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Atim-Tout_Peter-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "SO",
        "lang": "FR",
        "name": "ATK-Oxygene_Vol_4-(RETAiL)-FR-2019-SO",
        "year": 2019,
        "path": "vfs://saparNas/ATK-Oxygene_Vol_4-(RETAiL)-FR-2019-SO"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Atome-Nouveau_Depart-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Atome-Nouveau_Depart-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Aureo-Addict-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Aureo-Addict-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Axe_Shining-The_Times-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Axe_Shining-The_Times-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Barack_Adama-Calibre-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Barack_Adama-Calibre-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Barbe_Noir-Gaza_Boy-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Barbe_Noir-Gaza_Boy-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bary-Poche-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bary-Poche-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bayass-Freetyle_Chahut_1-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bayass-Freetyle_Chahut_1-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bayass-Freetyle_Chahut_2-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bayass-Freetyle_Chahut_2-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bayass-Freetyle_Chahut_3-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bayass-Freetyle_Chahut_3-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bbzalaprod-Lifestyle-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bbzalaprod-Lifestyle-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bekha-Bloque-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bekha-Bloque-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Benab-Booska_Benab-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Benab-Booska_Benab-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bena_One-Pause_Realite-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bena_One-Pause_Realite-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Beness-Orphelin-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Beness-Orphelin-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Ben_Krys-Sang_Noir-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Ben_Krys-Sang_Noir-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Beno-Des_Sous_Gars-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Beno-Des_Sous_Gars-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Benoit_Bizarre-1001_Pensees_Vers_Toi-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Benoit_Bizarre-1001_Pensees_Vers_Toi-WEB-FR-2019-OND"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Beozedzed-Lhistoire_Continue-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Beozedzed-Lhistoire_Continue-WEB-FR-2019-sceau"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Bertrand_Belin-Persona-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Bertrand_Belin-Persona-WEB-FR-2019-sceau"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Big_Daddy_Sr-A_Fleur_De_Peau_(Feat_Jean_Naimar)-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Big_Daddy_Sr-A_Fleur_De_Peau_(Feat_Jean_Naimar)-WEB-FR-2019-OND"
      },
      {
        "group": "WUS",
        "lang": "FR",
        "name": "Bigflo_Et_Oli--La_Vie_De_Reve_(Le_Livre-CD_De)-CD-FR-2019-WUS",
        "year": 2019,
        "path": "vfs://saparNas/Bigflo_Et_Oli--La_Vie_De_Reve_(Le_Livre-CD_De)-CD-FR-2019-WUS"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Biggietommy-Freestyle_Conviction-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Biggietommy-Freestyle_Conviction-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bigot-Rose_Noir-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bigot-Rose_Noir-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Biwai-2_Grammes_4-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Biwai-2_Grammes_4-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Blacky-Sortilege-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Blacky-Sortilege-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Blaise_Et_Renji-4_T_R_E-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Blaise_Et_Renji-4_T_R_E-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Blasko-San_Siro-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Blasko-San_Siro-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Booba-PGP-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Booba-PGP-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "BOPSI-Tas_Gagne-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/BOPSI-Tas_Gagne-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Bosh-OGATLC-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Bosh-OGATLC-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Boubak-Fou-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Boubak-Fou-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Box-Volontaire-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Box-Volontaire-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Brigitte_Bardot-Blizzard-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Brigitte_Bardot-Blizzard-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Brigitte_Bardot-Keep_In_Sight-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Brigitte_Bardot-Keep_In_Sight-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Brigitte_Bardot-Starry_Night-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Brigitte_Bardot-Starry_Night-WEB-FR-2019-OND"
      },
      {
        "group": "ENTiTLED",
        "lang": "FR",
        "name": "Bruit_Noir-II__III-WEB-FR-2019-ENTiTLED",
        "year": 2019,
        "path": "vfs://saparNas/Bruit_Noir-II__III-WEB-FR-2019-ENTiTLED"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Buds_Penseur-Sang_Froid-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Buds_Penseur-Sang_Froid-WEB-FR-2019-OND"
      },
      {
        "group": "ZzZ",
        "lang": "FR",
        "name": "C3tech_-_Je_Men_Vais-(CAT275821)-WEB-FR-2019-ZzZ",
        "year": 2019,
        "path": "vfs://saparNas/C3tech_-_Je_Men_Vais-(CAT275821)-WEB-FR-2019-ZzZ"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cahiips-Le_Lait-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cahiips-Le_Lait-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cahiips-Ohlala-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cahiips-Ohlala-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cali-Vous_Savez_Que_Je_Vous_Aime-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cali-Vous_Savez_Que_Je_Vous_Aime-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Caractere_Gras-Des_Chiffres_Et_Des_Lettres_(Feat_Oxymr)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Caractere_Gras-Des_Chiffres_Et_Des_Lettres_(Feat_Oxymr)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Caravelli-Keep_In_Sight-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Caravelli-Keep_In_Sight-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Caroline_Loeb-Comme_Sagan-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Caroline_Loeb-Comme_Sagan-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Caroline_Savoie-Pourchasser_Laube-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Caroline_Savoie-Pourchasser_Laube-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Castello-Deconnecte_(SamySam_Beats_Remix)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Castello-Deconnecte_(SamySam_Beats_Remix)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "CG6-Bart-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/CG6-Bart-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Charlelie_Couture-Meme_Pas_Sommeil-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Charlelie_Couture-Meme_Pas_Sommeil-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Charles_Aznavour-Bouse-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Charles_Aznavour-Bouse-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Chester-Belle_Epoque-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Chester-Belle_Epoque-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cheu-B-Gang-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cheu-B-Gang-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cheu-B-Ultimate_Trap-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cheu-B-Ultimate_Trap-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Chinwvr-Le_Son-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Chinwvr-Le_Son-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Christian_Tarroux-Sans_Contours_Definis-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Christian_Tarroux-Sans_Contours_Definis-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "Chronic_Law-Sport_Mode_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/Chronic_Law-Sport_Mode_Riddim-WEB-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cinco-Freestyle_OKLM_Preach-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cinco-Freestyle_OKLM_Preach-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Cinco-No_Cap-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Cinco-No_Cap-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Clarika-Meme_Pas_Peur-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Clarika-Meme_Pas_Peur-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Claude_Euclide-Songe-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Claude_Euclide-Songe-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Claudia_Phillips-Souvenez-Vous_De_Nous-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Claudia_Phillips-Souvenez-Vous_De_Nous-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "C-Nek-Couleur_Pastel-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/C-Nek-Couleur_Pastel-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Collectif_Metisse-Cest_Quoi_Le_Bonheur-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Collectif_Metisse-Cest_Quoi_Le_Bonheur-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Courir_Les_Rues-Devenir_Jeune-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Courir_Les_Rues-Devenir_Jeune-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Coyote_Elblanco-Lune-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Coyote_Elblanco-Lune-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Crazi-Tombe_Du_Ciel-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Crazi-Tombe_Du_Ciel-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Creance_De_Son-Fvckunembuscade-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Creance_De_Son-Fvckunembuscade-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Cynthia_Zely-Nee_Pour_Dominer-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Cynthia_Zely-Nee_Pour_Dominer-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "D2S-Echauffement_Pt_4-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/D2S-Echauffement_Pt_4-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "D.Ace-Cest_Promis_(Feat_Moussou)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/D.Ace-Cest_Promis_(Feat_Moussou)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dadinho-Valide-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dadinho-Valide-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dalida-Preserve_The_Good-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dalida-Preserve_The_Good-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dalida-Some_Good_Ones-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dalida-Some_Good_Ones-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Darius_Denon-Puisque_Cest_Ainsi-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Darius_Denon-Puisque_Cest_Ainsi-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "D.A.V-Preliminaire-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/D.A.V-Preliminaire-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Davy_Kilembe-Chansons_Damour-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Davy_Kilembe-Chansons_Damour-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dibson-Wesh_(Feat_The_S)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dibson-Wesh_(Feat_The_S)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Diddi_Trix-Petou_(Freestyle_Rapelite)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Diddi_Trix-Petou_(Freestyle_Rapelite)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Diegotbfd-Douceur_Hivernale-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Diegotbfd-Douceur_Hivernale-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Diez_Arenas-Elle_A_Tout-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Diez_Arenas-Elle_A_Tout-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dika-Illegal_Pour_Les_Plateformes-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dika-Illegal_Pour_Les_Plateformes-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Ding_Dong-Good_Ting_Dem-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Ding_Dong-Good_Ting_Dem-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dinor_Rdt-Octogone-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dinor_Rdt-Octogone-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dionysos-Une_Sirene_A_Paris-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dionysos-Une_Sirene_A_Paris-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Diva_Oyin-Tayah-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Diva_Oyin-Tayah-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Djena_Della-Booba_Vs_Kaaris-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Djena_Della-Booba_Vs_Kaaris-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "DJ_Kenny-Ouais_Cest_Bon-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/DJ_Kenny-Ouais_Cest_Bon-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Djox_Jonathan-Djoxs_Life-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Djox_Jonathan-Djoxs_Life-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Doc.Joe_Et_BigBen-Juge_Coupable-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Doc.Joe_Et_BigBen-Juge_Coupable-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Dorsaux-Adultere-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Dorsaux-Adultere-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Drizzy_Guwap-Jungle_King-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Drizzy_Guwap-Jungle_King-WEB-2019-JAH"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Easyvibe-Easyvibe_1_(Caribbean_lounge)-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Easyvibe-Easyvibe_1_(Caribbean_lounge)-WEB-FR-2019-AZF"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Eckow-Nous_2-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Eckow-Nous_2-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Eddy_Mitchell-Blizzard-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Eddy_Mitchell-Blizzard-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Eddy_Mitchell-Emotional_Security-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Eddy_Mitchell-Emotional_Security-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Eden_Fight-Dont_Leave_Me_(Reggae_Edit)-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Eden_Fight-Dont_Leave_Me_(Reggae_Edit)-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Edith_Piaf-Bouse-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Edith_Piaf-Bouse-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Edith_Piaf-Emotional_Security-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Edith_Piaf-Emotional_Security-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Effet_Papillon-Doppelganger-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Effet_Papillon-Doppelganger-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Eikichi-Reglement_Space_11-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Eikichi-Reglement_Space_11-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Elams-Faut_Que_Ca_Sarrete-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Elams-Faut_Que_Ca_Sarrete-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Elles_Sont_Imparfaites-Jsuis_Anxieux-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Elles_Sont_Imparfaites-Jsuis_Anxieux-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Emilie_Marsh-Jembrasse_Le_Premier_Soir-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Emilie_Marsh-Jembrasse_Le_Premier_Soir-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Enrico_Macias_Et_Al_Orchestra-Enrico_Macias_Et_Al_Orchestra-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Enrico_Macias_Et_Al_Orchestra-Enrico_Macias_Et_Al_Orchestra-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Enrico_Macias_Et_Al_Orchestra-Les_Filles_De_Mon_Pays-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Enrico_Macias_Et_Al_Orchestra-Les_Filles_De_Mon_Pays-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Enrico_Macias_Et_Al_Orchestra-Loriental-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Enrico_Macias_Et_Al_Orchestra-Loriental-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Ephrem-Drop_Life_(Feat_Booba)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Ephrem-Drop_Life_(Feat_Booba)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Ephrem-Spartiate_Freestyle-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Ephrem-Spartiate_Freestyle-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Epsylon-Cest_Plus_Le_Paradis-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Epsylon-Cest_Plus_Le_Paradis-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Erwann-Funambule-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Erwann-Funambule-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Estelle-Mon_Zion-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Estelle-Mon_Zion-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "Estiva_-_Little_Planet__Matt_Fax_Remixes-(STM256B)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/Estiva_-_Little_Planet__Matt_Fax_Remixes-(STM256B)-WEB-2019-MMS"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "Estiva_-_Little_Planet_(Matt_Fax_Remix)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/Estiva_-_Little_Planet_(Matt_Fax_Remix)-WEB-2019-MMS"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Euphonik-Cercueil_De_Peau-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Euphonik-Cercueil_De_Peau-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Faya971-Compte_A_Rebourt-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Faya971-Compte_A_Rebourt-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Faya971-Mouvement-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Faya971-Mouvement-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Faya971-Ne_Fais_Pas-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Faya971-Ne_Fais_Pas-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "FJ-Maloya_Grand_Papa-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/FJ-Maloya_Grand_Papa-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Flasko-Bonhomme-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Flasko-Bonhomme-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Flavie_Lea-Qui_Sait-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Flavie_Lea-Qui_Sait-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "FMP-Sans_Theme-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/FMP-Sans_Theme-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Foodja_Crew-Tome_1-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Foodja_Crew-Tome_1-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Francoise_Hardy-Bouse-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Francoise_Hardy-Bouse-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Francoise_Hardy-Ho_Ho_Ho-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Francoise_Hardy-Ho_Ho_Ho-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Francoise_Hardy-Some_Good_Ones-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Francoise_Hardy-Some_Good_Ones-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Frantzy-Maria-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Frantzy-Maria-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Freko-Best_Of_Freko-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Freko-Best_Of_Freko-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Freko-Le_Temps-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Freko-Le_Temps-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Frel-Asiat-SKRT-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Frel-Asiat-SKRT-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "FRT-Demoncratie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/FRT-Demoncratie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Gainsbite-Amour_Animal-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Gainsbite-Amour_Animal-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Ganlo-Je_Suis_La-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Ganlo-Je_Suis_La-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Genoux_Vener-SOS_Genoux-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Genoux_Vener-SOS_Genoux-WEB-FR-2019-OND"
      },
      {
        "group": "YARD",
        "lang": "",
        "name": "Gentlemans_Dub_Club-Lost_In_Space-CD-2019-YARD",
        "year": 2019,
        "path": "vfs://saparNas/Gentlemans_Dub_Club-Lost_In_Space-CD-2019-YARD"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Georges_Chelon-Parenthese-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Georges_Chelon-Parenthese-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Ghost_Rene-Dubtrap-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Ghost_Rene-Dubtrap-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Goulag-Fellaga_(Extrait_De_La_Compile_Cercle_Ferme)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Goulag-Fellaga_(Extrait_De_La_Compile_Cercle_Ferme)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "ENTiTLED",
        "lang": "",
        "name": "Gregor_Huebner-El_Violin_Latino_Vol_3_(Los_Sonadores)-WEB-2019-ENTiTLED",
        "year": 2019,
        "path": "vfs://saparNas/Gregor_Huebner-El_Violin_Latino_Vol_3_(Los_Sonadores)-WEB-2019-ENTiTLED"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "GR_OMEGA-Cest_Vrai_169-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/GR_OMEGA-Cest_Vrai_169-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Guirri_Mafia-Grrr-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Guirri_Mafia-Grrr-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Guy2Bezbar-My_Block-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Guy2Bezbar-My_Block-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "GwadaGuigz-Entre_Delire_Et_Derive-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/GwadaGuigz-Entre_Delire_Et_Derive-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Hache-P-Envoi_Le_Djaii-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Hache-P-Envoi_Le_Djaii-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Hamza-Paradise-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Hamza-Paradise-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Harisona-Un_Tour_En_Solo_Chapitre_1-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Harisona-Un_Tour_En_Solo_Chapitre_1-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Hash-Zenfant_Candos-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Hash-Zenfant_Candos-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Hatik-Chaise_Pliante_Pt_5-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Hatik-Chaise_Pliante_Pt_5-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Helena_Noguerra-_Je_Mens_(Avec_Vincent_Dedienne)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Helena_Noguerra-_Je_Mens_(Avec_Vincent_Dedienne)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Heuss_Lenfoire-En_Esprit-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Heuss_Lenfoire-En_Esprit-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Heuss_LEnfoire-George_Moula_(Feat_Koba_La_D)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Heuss_LEnfoire-George_Moula_(Feat_Koba_La_D)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Hraf-Tout_Donner-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Hraf-Tout_Donner-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "ENTiTLED",
        "lang": "",
        "name": "I_Against_I-Wish_I_Could_Remember-SINGLE-WEB-2019-ENTiTLED",
        "year": 2019,
        "path": "vfs://saparNas/I_Against_I-Wish_I_Could_Remember-SINGLE-WEB-2019-ENTiTLED"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "ICO-Octogone-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/ICO-Octogone-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "Ivan_Nasini_and_Danilo_Gariani_-_Flamenko_(Remix_2019)-(SMILE1429)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/Ivan_Nasini_and_Danilo_Gariani_-_Flamenko_(Remix_2019)-(SMILE1429)-WEB-2019-ZzZz"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jacobus-Caviar-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jacobus-Caviar-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jacques_Brel-Emotional_Security-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jacques_Brel-Emotional_Security-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "FR",
        "name": "Jahlys-Again_Again-SINGLE-WEB-FR-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Jahlys-Again_Again-SINGLE-WEB-FR-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Jahylon-Reviens_Moi-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Jahylon-Reviens_Moi-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jampoko-Vol_2-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jampoko-Vol_2-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jann_Beaudry-Legere-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jann_Beaudry-Legere-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "Jaron-WWJD_(Tight_Squeeze_Riddim)-SINGLE-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/Jaron-WWJD_(Tight_Squeeze_Riddim)-SINGLE-WEB-2019-RYG"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Jay_Felicite-758_Stories_3-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Jay_Felicite-758_Stories_3-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Jay_Psar_Dj_Septik-Gyal_(feat_Richie_Loop)_(Blackvs_Remix)-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Jay_Psar_Dj_Septik-Gyal_(feat_Richie_Loop)_(Blackvs_Remix)-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "C4",
        "lang": "",
        "name": "Jealous_Of_The_Birds-Wisdom_Teeth-(EP)-2019-C4",
        "year": 2019,
        "path": "vfs://saparNas/Jealous_Of_The_Birds-Wisdom_Teeth-(EP)-2019-C4"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jean_Ferrat-Emotional_Security-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jean_Ferrat-Emotional_Security-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jef_Ray_ILL-Jte_Mets_K.O.-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jef_Ray_ILL-Jte_Mets_K.O.-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jeremie-Amour_Platonique-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jeremie-Amour_Platonique-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jeune_Rebeu-Corazon-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jeune_Rebeu-Corazon-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jewel-Le_Biff-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jewel-Le_Biff-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jidma-Mr_Fuego-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jidma-Mr_Fuego-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Jim_Craxyi-One-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Jim_Craxyi-One-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jimmy_Magardeau-Green_Giant-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jimmy_Magardeau-Green_Giant-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jimmy_Magardeau-Intermarche-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jimmy_Magardeau-Intermarche-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jipe_Dalpe-Lattentat_(Radio_Edit)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jipe_Dalpe-Lattentat_(Radio_Edit)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Joe_Dwet_File-Impossible-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Joe_Dwet_File-Impossible-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Johnny_Keys-Long_Road-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Johnny_Keys-Long_Road-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "JokAir-Scarla-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/JokAir-Scarla-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Joke_Hill-Ma_Folie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Joke_Hill-Ma_Folie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "Jorn_Van_Deynhoven_-_Anthems__The_Remixes_Part_1-(ASOT524B)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/Jorn_Van_Deynhoven_-_Anthems__The_Remixes_Part_1-(ASOT524B)-WEB-2019-MMS"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jorrdee-ACT_1-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jorrdee-ACT_1-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jorrdee-Belle_De_Jour-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jorrdee-Belle_De_Jour-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jorrdee-La_25eme_Heure-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jorrdee-La_25eme_Heure-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jorrdee-La_Nuit_Avant_Le_Jour-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jorrdee-La_Nuit_Avant_Le_Jour-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Jorrdee-WAVERS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Jorrdee-WAVERS-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "Jr_O_Crom-Love-WEB-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/Jr_O_Crom-Love-WEB-FR-2019-H5N1"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Juice-Multifruits_2-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Juice-Multifruits_2-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Julien_Clerc-Inedits_1968-1998-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Julien_Clerc-Inedits_1968-1998-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Julie-Toi_Mon_Amour-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Julie-Toi_Mon_Amour-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Juninho-Faire_Au_Mieux-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Juninho-Faire_Au_Mieux-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Junior-Aurevoir-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Junior-Aurevoir-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Junior_Bvndo-Cash_N_Kush_(Feat_Leto)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Junior_Bvndo-Cash_N_Kush_(Feat_Leto)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "SO",
        "lang": "FR",
        "name": "Kaaris-Or_Noir_3-FR-2019-SO",
        "year": 2019,
        "path": "vfs://saparNas/Kaaris-Or_Noir_3-FR-2019-SO"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kaaris-Or_Noir_Part_3-BONUS_TRACKS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kaaris-Or_Noir_Part_3-BONUS_TRACKS-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kaf_Malbar-Da_Poche_(Feat_DJ_Sebb)_(AnFouPaMalStaya)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kaf_Malbar-Da_Poche_(Feat_DJ_Sebb)_(AnFouPaMalStaya)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "FR",
        "name": "Kafra_Metod_MC-Round_up_ready-WEB-FR-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Kafra_Metod_MC-Round_up_ready-WEB-FR-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Kalex-Like_This-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Kalex-Like_This-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kamikaz-Freestyle_De_Street_Episode_7-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kamikaz-Freestyle_De_Street_Episode_7-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Kamil_Bednarek-MTV_Unplugged_Bednarek-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Kamil_Bednarek-MTV_Unplugged_Bednarek-WEB-2019-JAH"
      },
      {
        "group": "dh",
        "lang": "",
        "name": "Karol_XVII-MB_Valence--Aqua_(Remixes)-(GPM493)-WEB-2019-dh",
        "year": 2019,
        "path": "vfs://saparNas/Karol_XVII-MB_Valence--Aqua_(Remixes)-(GPM493)-WEB-2019-dh"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "KeenV-Ils_Veulent_Du_Ragga-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/KeenV-Ils_Veulent_Du_Ragga-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Keren_Ann-Sous_Leau-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Keren_Ann-Sous_Leau-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kerjostyle-Lheure_Bleue-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kerjostyle-Lheure_Bleue-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kespar-Le_Jus-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kespar-Le_Jus-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Keurta-Persevere-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Keurta-Persevere-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "FR",
        "name": "Kevni_San-San_Blesse_Yo-SINGLE-WEB-FR-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Kevni_San-San_Blesse_Yo-SINGLE-WEB-FR-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kiddam_And_The_People-Les_Perf_De_Katp_4_(Duo_Voix_Batterie)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kiddam_And_The_People-Les_Perf_De_Katp_4_(Duo_Voix_Batterie)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Kiishimay-One_and_Only-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Kiishimay-One_and_Only-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "Killa_B_And_Clever-Red_Velvet_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/Killa_B_And_Clever-Red_Velvet_Riddim-WEB-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kirouac_Et_Kodakludo-AMOS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kirouac_Et_Kodakludo-AMOS-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Koba_LaD-FeFe-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Koba_LaD-FeFe-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Konshens-Set_It_Up-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Konshens-Set_It_Up-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kosla-Sweet_(Feat_DJ_Mike_974)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kosla-Sweet_(Feat_DJ_Mike_974)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Kreyol_La-Tou_Limen-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Kreyol_La-Tou_Limen-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "KRK-Black-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/KRK-Black-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "Kursiva-Waveform_Shapeshifter_Remixed_LP-(RLDIGLP002)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/Kursiva-Waveform_Shapeshifter_Remixed_LP-(RLDIGLP002)-WEB-2019-NDE"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Kvrtel_Gvng-Flex_(Feat_Kenox)-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Kvrtel_Gvng-Flex_(Feat_Kenox)-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Kwistof-Degaine_Pas-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Kwistof-Degaine_Pas-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Labominable_Steucko-Ufo-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Labominable_Steucko-Ufo-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lacrim-Bloody_(Feat_6ix9ine)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lacrim-Bloody_(Feat_6ix9ine)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "SO",
        "lang": "FR",
        "name": "Lacrim-Lacrim-2CD-FR-2019-SO",
        "year": 2019,
        "path": "vfs://saparNas/Lacrim-Lacrim-2CD-FR-2019-SO"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lacrim-Tiguere_2_(Freestyle)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lacrim-Tiguere_2_(Freestyle)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lafrog-On_Verra-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lafrog-On_Verra-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Lahjihkal-Ah_Bwoy-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Lahjihkal-Ah_Bwoy-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "LAllemand-69200-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/LAllemand-69200-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "La_M2-Mes_Defauts-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/La_M2-Mes_Defauts-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Lamalgame-Fleur_De_Chou-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Lamalgame-Fleur_De_Chou-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Lamalgame-Lile_De_Lamalgame-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Lamalgame-Lile_De_Lamalgame-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lanfan-Plus_Fort_Que_Moi-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lanfan-Plus_Fort_Que_Moi-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "La_Place-Ambiance-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/La_Place-Ambiance-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lapo-LApologue_Vol_2-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lapo-LApologue_Vol_2-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lartiste-Quartier_Latin_Vol_1-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lartiste-Quartier_Latin_Vol_1-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "Lartiste-TIKKA_Feat_Heuss_Lenfoire-WEB-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/Lartiste-TIKKA_Feat_Heuss_Lenfoire-WEB-FR-2019-H5N1"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "La_Science_Deejay_Maestro_Et_Bishop-OFLB-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/La_Science_Deejay_Maestro_Et_Bishop-OFLB-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Laura_LTX-Supprime_Mon_Numero-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Laura_LTX-Supprime_Mon_Numero-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Laure_Briard-Un_Peu_Plus_Damour_Sil_Vous_Plait-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Laure_Briard-Un_Peu_Plus_Damour_Sil_Vous_Plait-WEB-FR-2019-sceau"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Laurence-Anne-Premiere_Apparition-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Laurence-Anne-Premiere_Apparition-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Layonz-Namje-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Layonz-Namje-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Leila_Ssina-Psychopute-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Leila_Ssina-Psychopute-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Le_J-Jour_J-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Le_J-Jour_J-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Leodas-Pas_De_Plan-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Leodas-Pas_De_Plan-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Leo_Ng-Bansoa_Rap-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Leo_Ng-Bansoa_Rap-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Le_R-La_Jalousie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Le_R-La_Jalousie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_12_Salopards-Allez_Les_12-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_12_Salopards-Allez_Les_12-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Les_Anges_Premier-Bebe_Gater-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Les_Anges_Premier-Bebe_Gater-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_Chaussettes_Noires-Listen_This_Music-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_Chaussettes_Noires-Listen_This_Music-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_Compagnons_De_La_Chanson-Emotional_Security-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_Compagnons_De_La_Chanson-Emotional_Security-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_Compagnons_De_La_Chanson-Preserve_The_Good-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_Compagnons_De_La_Chanson-Preserve_The_Good-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_Gars_Du_Coin-Chateau_Du_Coin_2017-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_Gars_Du_Coin-Chateau_Du_Coin_2017-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_Ogres_De_Barback-Ptit_Coeur-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_Ogres_De_Barback-Ptit_Coeur-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Les_Ticouz-Opus_1-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Les_Ticouz-Opus_1-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "Les_Yeux_Dla_Tete-Murcielago-WEB-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/Les_Yeux_Dla_Tete-Murcielago-WEB-FR-2019-H5N1"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "LFS_Music_and_Lyrikal-Issa_Blessing-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/LFS_Music_and_Lyrikal-Issa_Blessing-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lil_Mendes-Thierry_Coquillettes-BONUS_TRACKS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lil_Mendes-Thierry_Coquillettes-BONUS_TRACKS-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Lindispensable_Max-Mots_De_Tete_(O-Max)-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Lindispensable_Max-Mots_De_Tete_(O-Max)-WEB-FR-2019-AZF"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Little_Harry-Youngest_Veteron_(Remixed)-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Little_Harry-Youngest_Veteron_(Remixed)-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "L.K.H-STLM_(Sens_Tu_Le_Mouvement)-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/L.K.H-STLM_(Sens_Tu_Le_Mouvement)-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Loki-Roule_Le_Papier-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Loki-Roule_Le_Papier-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lomepal_Et_ACapriccio-Trop_Beau-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lomepal_Et_ACapriccio-Trop_Beau-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lord_Esperanza-Believe-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lord_Esperanza-Believe-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Los_Grumos-Ca_Donne-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Los_Grumos-Ca_Donne-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "ENRiCH",
        "lang": "FR",
        "name": "Lou-Adriane_Cassidy-Cest_la_fin_du_monde_a_tous_les_jours-WEB-FR-2019-ENRiCH",
        "year": 2019,
        "path": "vfs://saparNas/Lou-Adriane_Cassidy-Cest_la_fin_du_monde_a_tous_les_jours-WEB-FR-2019-ENRiCH"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Lou_Doillon-Soliloquy-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Lou_Doillon-Soliloquy-WEB-FR-2019-sceau"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lou_Et_Maltess-Le_Singe_Et_La_Gazelle-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lou_Et_Maltess-Le_Singe_Et_La_Gazelle-WEB-FR-2019-OND"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Loveni-Une_Nuit_Avec_Un_Bon_Gamin-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Loveni-Une_Nuit_Avec_Un_Bon_Gamin-WEB-FR-2019-sceau"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Loveson-Perdues_(Feat_MayMayRDS)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Loveson-Perdues_(Feat_MayMayRDS)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lucasdu237-Sur_Le_Cotey-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lucasdu237-Sur_Le_Cotey-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Luc_Leandry-Missie_Vaval-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Luc_Leandry-Missie_Vaval-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Luke-Porcelaine-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Luke-Porcelaine-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Luv_Resval-Reglement_Space_12-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Luv_Resval-Reglement_Space_12-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lycos-Aidez-Moi_(Feat_Narkonic)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lycos-Aidez-Moi_(Feat_Narkonic)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Lyna_Mahyem-Demain-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Lyna_Mahyem-Demain-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "M16_Masque-Episode_03-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/M16_Masque-Episode_03-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Machel_Montano-GOAT-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Machel_Montano-GOAT-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Madness-Sang_Lie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Madness-Sang_Lie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "",
        "name": "Madx-Afro_Zouk_Gems-WEB-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Madx-Afro_Zouk_Gems-WEB-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Manu_Le_Cok-Cest_Pas_La_Meme-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Manu_Le_Cok-Cest_Pas_La_Meme-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Marcel_Amont-Listen_This_Music-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Marcel_Amont-Listen_This_Music-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Marco_Caine-A_Linfini-BONUS_TRACKS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Marco_Caine-A_Linfini-BONUS_TRACKS-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Marin-Bois_De_Leau-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Marin-Bois_De_Leau-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Marynn-Je_Drone-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Marynn-Je_Drone-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "M.D.C-Freestyle_De_Noel-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/M.D.C-Freestyle_De_Noel-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Meda-Un_Pas_Vers_Lavenir_2.0-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Meda-Un_Pas_Vers_Lavenir_2.0-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Mederice-Prisonniere-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Mederice-Prisonniere-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Mederice-Sega_Mon_Passion-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Mederice-Sega_Mon_Passion-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mehdi-Badi-Abysses-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mehdi-Badi-Abysses-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mekza-My_Life-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mekza-My_Life-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mesrine-A_Ceux-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mesrine-A_Ceux-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mgdc_King-Elle_Ta_Douille-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mgdc_King-Elle_Ta_Douille-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Miro_Starf-Beldia-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Miro_Starf-Beldia-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mistral-Comme_Une_Onde-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mistral-Comme_Une_Onde-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mitrix-Se_Mueve_(Feat_Frediix_Stayaman)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mitrix-Se_Mueve_(Feat_Frediix_Stayaman)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mixton-Tu_Me_Fais_Planer-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mixton-Tu_Me_Fais_Planer-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "MIYA-La_Maletta_(Feat_La_Famax)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/MIYA-La_Maletta_(Feat_La_Famax)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "M-Lettre_Infinie-WEB-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/M-Lettre_Infinie-WEB-FR-2019-H5N1"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "Modell_Clinton-Stay_With_Me_(Feat_Platinum_B_Love)-SINGLE-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/Modell_Clinton-Stay_With_Me_(Feat_Platinum_B_Love)-SINGLE-WEB-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Monf-Contre-Pouvoir-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Monf-Contre-Pouvoir-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Monsieur_Jack-Post_Traumatique-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Monsieur_Jack-Post_Traumatique-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Monza-MNSR_LE_PRSDNT-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Monza-MNSR_LE_PRSDNT-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Moona-Mamma_Mia_(Feat_Kpoint)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Moona-Mamma_Mia_(Feat_Kpoint)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Moses_I-Dancing_Girls-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Moses_I-Dancing_Girls-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Moums-Jfais_Mon_Chemin-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Moums-Jfais_Mon_Chemin-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Mous-K-OK_USA_6.7-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Mous-K-OK_USA_6.7-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Mr_Diligent-The_Construction-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Mr_Diligent-The_Construction-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "NAB-Bah_We-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/NAB-Bah_We-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Najoua_Belyzel-Tu_Me_Laisses_Aller_(Remixes)-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Najoua_Belyzel-Tu_Me_Laisses_Aller_(Remixes)-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Narkotype-Hors_La_Loi-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Narkotype-Hors_La_Loi-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nassai-Atmosphere-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nassai-Atmosphere-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Natty_Soljah-Comme_Un_Peut-Etre-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Natty_Soljah-Comme_Un_Peut-Etre-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nayka-La_Recette-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nayka-La_Recette-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nebe-YSL-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nebe-YSL-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Nefaste-Au_Loin-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Nefaste-Au_Loin-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nehuda-Comment_Te_Dire-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nehuda-Comment_Te_Dire-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nella-Je_Merite_Mieux_Que_Toi-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nella-Je_Merite_Mieux_Que_Toi-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nel-Melancolie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nel-Melancolie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "Nessa_Preppy-Right_Now_(Jollof_Rice_Riddim)-SINGLE-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/Nessa_Preppy-Right_Now_(Jollof_Rice_Riddim)-SINGLE-WEB-2019-RYG"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Neyssatou-War-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Neyssatou-War-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "Niels_Van_Gogh_-_Pulverturm__Tiestos_Big_Room_Extended_Remix-(MF323)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/Niels_Van_Gogh_-_Pulverturm__Tiestos_Big_Room_Extended_Remix-(MF323)-WEB-2019-MMS"
      },
      {
        "group": "FM",
        "lang": "",
        "name": "Niels_Van_Gogh_-_Pulverturm_(Tiestos_Big_Room_Remix)-WEB-2019-FM",
        "year": 2019,
        "path": "vfs://saparNas/Niels_Van_Gogh_-_Pulverturm_(Tiestos_Big_Room_Remix)-WEB-2019-FM"
      },
      {
        "group": "FMC",
        "lang": "",
        "name": "Niels_Van_Gogh_-_Pulverturm_(Tiestos_Big_Room_Remix)-WEB-2019-FMC",
        "year": 2019,
        "path": "vfs://saparNas/Niels_Van_Gogh_-_Pulverturm_(Tiestos_Big_Room_Remix)-WEB-2019-FMC"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nima-Qui_Etait_La-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nima-Qui_Etait_La-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nino_Baresco-Le_Loup_De_Valhalla-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nino_Baresco-Le_Loup_De_Valhalla-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "NOR-Gos_Gars_(Feat_Abdi)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/NOR-Gos_Gars_(Feat_Abdi)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Nu_Chilly-Nu_Spicy_Chilly-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Nu_Chilly-Nu_Spicy_Chilly-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Nya-Valide_(Feat_Massa)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Nya-Valide_(Feat_Massa)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Oce_Band-I_See_The_Light-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Oce_Band-I_See_The_Light-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Omaley-Free_Life-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Omaley-Free_Life-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "O-Mega-A_Nous_Deux-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/O-Mega-A_Nous_Deux-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "One_Out_Rajus-Friday_Night-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/One_Out_Rajus-Friday_Night-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Oprah-Aya-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Oprah-Aya-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Orijinal_Fox-Ou_Mwen_Le-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Orijinal_Fox-Ou_Mwen_Le-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Orisha_Sound-Fire_n_Ice-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Orisha_Sound-Fire_n_Ice-WEB-2019-JAH"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Oumar-Migos-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Oumar-Migos-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "P2A-Oh_Sa_Mere-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/P2A-Oh_Sa_Mere-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Palmae-4_Saisons-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Palmae-4_Saisons-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Petula_Clark-Preserve_The_Good-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Petula_Clark-Preserve_The_Good-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Phil_Francis-Laugh_It_Off-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Phil_Francis-Laugh_It_Off-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Pierilix-Redemption-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Pierilix-Redemption-WEB-FR-2019-OND"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "Platinum_Doug_-_Funksoul_Brother_(Incl._Edit)-(NDF263)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/Platinum_Doug_-_Funksoul_Brother_(Incl._Edit)-(NDF263)-WEB-2019-MMS"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "PLL_Et_DJ_Sebb-Ou_La_Rode-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/PLL_Et_DJ_Sebb-Ou_La_Rode-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Popcaan-Best__Blessed-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Popcaan-Best__Blessed-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Prime-Tout_Donner-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Prime-Tout_Donner-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "QueenTress-On_My_Mind_EP-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/QueenTress-On_My_Mind_EP-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "R8_En_La_Casa-Dembow-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/R8_En_La_Casa-Dembow-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Ramo-A_Nouveau_Sauvages-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Ramo-A_Nouveau_Sauvages-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Raphael_Uzzan-Le_Son_Des_Caraibes-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Raphael_Uzzan-Le_Son_Des_Caraibes-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "RATEPI-Generation_Y-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/RATEPI-Generation_Y-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Reda-Confond_Pas-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Reda-Confond_Pas-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Reda-Dans_La_Ville-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Reda-Dans_La_Ville-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Rekma-Minuit_Confidence-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Rekma-Minuit_Confidence-WEB-FR-2019-OND"
      },
      {
        "group": "ZzZz",
        "lang": "FR",
        "name": "Remundo_and_Tigrou_-_Viens_Avec_Moi-(4061707128615)-WEB-FR-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/Remundo_and_Tigrou_-_Viens_Avec_Moi-(4061707128615)-WEB-FR-2019-ZzZz"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Remy-Friendzone-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Remy-Friendzone-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "MOHAWK",
        "lang": "FR",
        "name": "Requin_Chagrin-Semaphore-WEB-FR-2019-MOHAWK",
        "year": 2019,
        "path": "vfs://saparNas/Requin_Chagrin-Semaphore-WEB-FR-2019-MOHAWK"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Reyel-Bale_Wouze_(Feat_Franco_Love)_(Kanaval)-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Reyel-Bale_Wouze_(Feat_Franco_Love)_(Kanaval)-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Rg_Tarus-Bad_Bad-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Rg_Tarus-Bad_Bad-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Rhymer13x7-Jane_Doe-BONUS_TRACKS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Rhymer13x7-Jane_Doe-BONUS_TRACKS-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Ricky_Domi-Rastafari-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Ricky_Domi-Rastafari-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "RK-Redemption-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/RK-Redemption-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Roozy-Leve_Kanpe_Karnaval_2019_(Feat_Bazoo_Kagoole_Hdogg_Plastic)-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Roozy-Leve_Kanpe_Karnaval_2019_(Feat_Bazoo_Kagoole_Hdogg_Plastic)-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Royce-Etape_2_Le_Bosseur-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Royce-Etape_2_Le_Bosseur-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Royce-Etape_3_Le_Yencli-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Royce-Etape_3_Le_Yencli-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "RSL-Spitsessie_CDLXVII_Zonamo_Underground-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/RSL-Spitsessie_CDLXVII_Zonamo_Underground-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Ryno_Izlay-Qui_Je_Suis-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Ryno_Izlay-Qui_Je_Suis-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "S7V7N-S7V7N_SINS-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/S7V7N-S7V7N_SINS-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Saah_Karim-The_Lyrical_Warrior-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Saah_Karim-The_Lyrical_Warrior-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Saida_LAuthenticite-Anthologie_1996-2008-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Saida_LAuthenticite-Anthologie_1996-2008-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Saint_Hilaire-Has_Been-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Saint_Hilaire-Has_Been-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Salga-ADN-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Salga-ADN-WEB-FR-2019-OND"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "Salva_Di_Nobles_-_Dont_Stop-(27FS019)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/Salva_Di_Nobles_-_Dont_Stop-(27FS019)-WEB-2019-ZzZz"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Samini-Dagaati-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Samini-Dagaati-WEB-2019-JAH"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Sam-J_Le_King-Jai_Connu-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Sam-J_Le_King-Jai_Connu-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Scorpion-Protege-Toi-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Scorpion-Protege-Toi-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Secteur_5-Souler-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Secteur_5-Souler-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Serge_Gainsbourg-Preserve_The_Good-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Serge_Gainsbourg-Preserve_The_Good-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sese_Kepler-Le_Gang-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sese_Kepler-Le_Gang-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "Seth_Gueko-Destroy-(Retail)-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/Seth_Gueko-Destroy-(Retail)-FR-2019-H5N1"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Seth_Gueko-Destroy-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Seth_Gueko-Destroy-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Sham-Dumby_Land-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Sham-Dumby_Land-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sheryfy-Dans_Mon_Del-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sheryfy-Dans_Mon_Del-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sheryfy-Reste_Avec_Moi-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sheryfy-Reste_Avec_Moi-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "ShiSen-Pas_De_Limite-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/ShiSen-Pas_De_Limite-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Shotas-GTA_8-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Shotas-GTA_8-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Shotas-Van_Persie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Shotas-Van_Persie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Shym-Absolem_(Feat_Youssoupha_Et_Kemmler)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Shym-Absolem_(Feat_Youssoupha_Et_Kemmler)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "WUS",
        "lang": "FR",
        "name": "Simon_Kearney--Maison_Ouverte-CD-FR-2019-WUS",
        "year": 2019,
        "path": "vfs://saparNas/Simon_Kearney--Maison_Ouverte-CD-FR-2019-WUS"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "Simon_Patterson_and_Sam_Jones_-_Rotavator_(Sam_Jones_Remix)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/Simon_Patterson_and_Sam_Jones_-_Rotavator_(Sam_Jones_Remix)-WEB-2019-MMS"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sinik-Lassassin_II-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sinik-Lassassin_II-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sketdi_And_The_Chapodz-Premier_Degre-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sketdi_And_The_Chapodz-Premier_Degre-WEB-FR-2019-OND"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "SKG-Cest_La_Vie-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/SKG-Cest_La_Vie-WEB-FR-2019-sceau"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "SlowMotionz1-Jamaican_Love-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/SlowMotionz1-Jamaican_Love-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sonic_Riviera-Papaoutai-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sonic_Riviera-Papaoutai-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Spart_Mc-Mommy_(Radio_Edit)-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Spart_Mc-Mommy_(Radio_Edit)-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Spice-No_Gyal-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Spice-No_Gyal-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Squeeky_Plus-Born_and_Raise-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Squeeky_Plus-Born_and_Raise-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Squeezy_Ramses-Poison-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Squeezy_Ramses-Poison-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Ss-Carnaval-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Ss-Carnaval-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Stan_Ounka-La_Marque_Maudite-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Stan_Ounka-La_Marque_Maudite-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Star_Prynce_feat._Lutan_Fyah-Night_Shift-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Star_Prynce_feat._Lutan_Fyah-Night_Shift-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Steve_Beezy-Valeur_Sure-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Steve_Beezy-Valeur_Sure-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Stony_Vybz-Step_Fi_Victory-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Stony_Vybz-Step_Fi_Victory-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Stylo_G-Whoop_Whoop-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Stylo_G-Whoop_Whoop-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Supreme_Wavy-Une_Fleur_Peut_Fleurir_En_Decembre-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Supreme_Wavy-Une_Fleur_Peut_Fleurir_En_Decembre-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Suro-Pardonne-Moi-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Suro-Pardonne-Moi-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Swenz-Reglement_Space_9-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Swenz-Reglement_Space_9-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Swift_Guad_Et_Raw_Saitama-Guerilla-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Swift_Guad_Et_Raw_Saitama-Guerilla-WEB-FR-2019-sceau"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sylphe-Profil_Bas-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sylphe-Profil_Bas-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Sylvain_Lambert-Grand_Menage-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Sylvain_Lambert-Grand_Menage-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "TaiZ-Balle_Au_Centre-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/TaiZ-Balle_Au_Centre-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Taj_King-Love_A_Love-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Taj_King-Love_A_Love-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Telopath-Beautiful-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Telopath-Beautiful-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Terence-Jeune_Prince-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Terence-Jeune_Prince-WEB-FR-2019-OND"
      },
      {
        "group": "H5N1",
        "lang": "FR",
        "name": "Tete-Fauthentique-WEB-FR-2019-H5N1",
        "year": 2019,
        "path": "vfs://saparNas/Tete-Fauthentique-WEB-FR-2019-H5N1"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "The_Blank_Ones-Nachy__Deko-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/The_Blank_Ones-Nachy__Deko-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "The_Divaz-La_Voix_Daretha-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/The_Divaz-La_Voix_Daretha-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Thomas_Ezekiel-Hypsophonia_19h47-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Thomas_Ezekiel-Hypsophonia_19h47-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "FR",
        "name": "Ti_Fred-Croire_En_Nous-SINGLE-WEB-FR-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/Ti_Fred-Croire_En_Nous-SINGLE-WEB-FR-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Timal-Story-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Timal-Story-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Tinez-O_Stup_It-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Tinez-O_Stup_It-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "T.Killa-Frappe_Chirurgicale-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/T.Killa-Frappe_Chirurgicale-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "T.Killa-Shogun-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/T.Killa-Shogun-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "T.Killa-Teresi-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/T.Killa-Teresi-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "T.Killa-Trou2Boulette-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/T.Killa-Trou2Boulette-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Tony_Drumzz-Kembe_Pa_Lage-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Tony_Drumzz-Kembe_Pa_Lage-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "TracyLor-Faut_Partir_Avec-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/TracyLor-Faut_Partir_Avec-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Tshanda-Fais_La_Tourner-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Tshanda-Fais_La_Tourner-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Twodee-L.R.E.L-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Twodee-L.R.E.L-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Twosides_NMVL-Ca_Va_Consommer-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Twosides_NMVL-Ca_Va_Consommer-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-2019_Master_Tera_Hits_Still_Addict_Of_Sleng_Teng-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-2019_Master_Tera_Hits_Still_Addict_Of_Sleng_Teng-WEB-2019-RYG"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_4X3_Of_The_Best_Uplifting_Trance-(YR802)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_4X3_Of_The_Best_Uplifting_Trance-(YR802)-WEB-2019-ZzZz"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-8_Years_Anniversary_Best_Of_Cubek_Pt._2_Selected_By_Terry_And_Douglas-(CBK354)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-8_Years_Anniversary_Best_Of_Cubek_Pt._2_Selected_By_Terry_And_Douglas-(CBK354)-WEB-2019-NDE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Afro_House_Essentials_Vol_06-(LWAHE06)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Afro_House_Essentials_Vol_06-(LWAHE06)-WEB-2019-ENSLAVE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-AfroMove_Musics_Best_Of_2018-(AM056)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-AfroMove_Musics_Best_Of_2018-(AM056)-WEB-2019-NDE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-A_Little_Bit_Of_Sunshine-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-A_Little_Bit_Of_Sunshine-WEB-2019-JAH"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-All_The_Same_Dream_(Remixes)-(PI218)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-All_The_Same_Dream_(Remixes)-(PI218)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Android_Muziq_(Best_of_2018)-(ANDROIDCD25)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Android_Muziq_(Best_of_2018)-(ANDROIDCD25)-WEB-2019-ENSLAVE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Anti-Stush_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Anti-Stush_Riddim-WEB-2019-RYG"
      },
      {
        "group": "SO",
        "lang": "FR",
        "name": "VA-ATK_et_Ulteam_Atom_Presentent_Prestige_1998-FR-2019-SO",
        "year": 2019,
        "path": "vfs://saparNas/VA-ATK_et_Ulteam_Atom_Presentent_Prestige_1998-FR-2019-SO"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Audiomatiques_Presents_BEST_OF_2018-(UNRILISEL008)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Audiomatiques_Presents_BEST_OF_2018-(UNRILISEL008)-WEB-2019-ENSLAVE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Bad_Diesel_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Bad_Diesel_Riddim-WEB-2019-RYG"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "VA_-_Base_Hits_Vol._5-(BASECL038)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Base_Hits_Vol._5-(BASECL038)-WEB-2019-MMS"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Believers_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Believers_Riddim-WEB-2019-JAH"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Beng_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Beng_Riddim-WEB-2019-RYG"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Berlin_Techno_Essentials_Vol_09-(FFR167)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Berlin_Techno_Essentials_Vol_09-(FFR167)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Berlin_Techno_Essentials_Vol_09-(LWBTE09)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Berlin_Techno_Essentials_Vol_09-(LWBTE09)-WEB-2019-NDE"
      },
      {
        "group": "BB8",
        "lang": "",
        "name": "VA-BesTeracT_(Best_of_2018)-(TESD_0250)-WEB-2019-BB8",
        "year": 2019,
        "path": "vfs://saparNas/VA-BesTeracT_(Best_of_2018)-(TESD_0250)-WEB-2019-BB8"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-BesTeracT_(Best_Of_2018)-(TESD0250)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-BesTeracT_(Best_Of_2018)-(TESD0250)-WEB-2019-NDE"
      },
      {
        "group": "BB8",
        "lang": "",
        "name": "VA-Best_of_2018-(405681_3118773)-WEB-2019-BB8",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_2018-(405681_3118773)-WEB-2019-BB8"
      },
      {
        "group": "SHELTER",
        "lang": "",
        "name": "VA--Best_Of_2018-(AM2018)-WEB-2019-SHELTER",
        "year": 2019,
        "path": "vfs://saparNas/VA--Best_Of_2018-(AM2018)-WEB-2019-SHELTER"
      },
      {
        "group": "AFO",
        "lang": "",
        "name": "VA-Best_of_2018-(SMDVA029)-WEB-2019-AFO",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_2018-(SMDVA029)-WEB-2019-AFO"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "VA_-_Best_Of_2018_Vol._1-(KSXC011)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Best_Of_2018_Vol._1-(KSXC011)-WEB-2019-MMS"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "VA_-_Best_Of_2018_Vol._2-(KSXC012)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Best_Of_2018_Vol._2-(KSXC012)-WEB-2019-MMS"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_Of_AlYf_Recordings_(004)-(ALYF125)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_AlYf_Recordings_(004)-(ALYF125)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_Of_Cacao-(CAO015)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Cacao-(CAO015)-WEB-2019-ENSLAVE"
      },
      {
        "group": "FALCON",
        "lang": "",
        "name": "VA-Best_Of_Clubsonica_Records_2018-WEB-2019-FALCON",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Clubsonica_Records_2018-WEB-2019-FALCON"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_of_FEIND_2018-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_FEIND_2018-WEB-2019-ENSLAVE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Best_Of_Filthy_Sounds_2018-(FSBOFS001)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Filthy_Sounds_2018-(FSBOFS001)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Best_Of_Frame_Workxx_Records_2018_Volume_III-(735119001531)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Frame_Workxx_Records_2018_Volume_III-(735119001531)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Best_Of_Future_House_Vol_22-(RVMCOMP882A)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Future_House_Vol_22-(RVMCOMP882A)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Best_Of_Ibiza_6-(AM425)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Ibiza_6-(AM425)-WEB-2019-NDE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_Of_Jackin_House_2018-(DBRBJ2018)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Jackin_House_2018-(DBRBJ2018)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_Of_Low_Groove-(LOW100)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Low_Groove-(LOW100)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_of_Moira_2018-(BOM003)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_Moira_2018-(BOM003)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Best_of_Serial_Killaz_2018-(KILLAZLP005DIG)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_Serial_Killaz_2018-(KILLAZLP005DIG)-WEB-2019-ENSLAVE"
      },
      {
        "group": "AFO",
        "lang": "",
        "name": "VA-Best_of_the_Year_2018_Pt._1-(MYC006C)-WEB-2019-AFO",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_the_Year_2018_Pt._1-(MYC006C)-WEB-2019-AFO"
      },
      {
        "group": "AFO",
        "lang": "",
        "name": "VA-Best_of_the_Year_2018_Pt._2-(MYC007C)-WEB-2019-AFO",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_of_the_Year_2018_Pt._2-(MYC007C)-WEB-2019-AFO"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Best_Of_Turning_Wheel_Rec_Vol_20-(4061707083174)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Of_Turning_Wheel_Rec_Vol_20-(4061707083174)-WEB-2019-NDE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Best_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Best_Riddim-WEB-2019-JAH"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Better_Place_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Better_Place_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Big_Party_(EDM_Anthems_2019)-(EBN272)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Big_Party_(EDM_Anthems_2019)-(EBN272)-WEB-2019-ZzZz"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Blacq_Magiq_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Blacq_Magiq_Riddim-WEB-2019-RYG"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Bone_Seeker_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Bone_Seeker_Riddim-WEB-2019-RYG"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Breathless_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Breathless_Riddim-WEB-2019-JAH"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Cheat_Code_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Cheat_Code_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Cheeky_Tracks_Club_Anthems_2019-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Cheeky_Tracks_Club_Anthems_2019-WEB-2019-ZzZz"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Clock_Wine_Riddim-(JW138)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Clock_Wine_Riddim-(JW138)-WEB-2019-NDE"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Club_Hits.10-(CAT270815)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Club_Hits.10-(CAT270815)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Club_Hits.12-(CAT270817)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Club_Hits.12-(CAT270817)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Club_Hits.6-(CAT270810)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Club_Hits.6-(CAT270810)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Club_Hits.7-(CAT270811)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Club_Hits.7-(CAT270811)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Club_Hits.8-(CAT270813)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Club_Hits.8-(CAT270813)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Club_Hits.9-(CAT270814)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Club_Hits.9-(CAT270814)-WEB-2019-ZzZz"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Conscious_Sounds_Presents_The_Human_Series-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Conscious_Sounds_Presents_The_Human_Series-WEB-2019-JAH"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Counter_Pulse_Best_of_2018-(CPC06)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Counter_Pulse_Best_of_2018-(CPC06)-WEB-2019-ENSLAVE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Count_Your_Blessings_Riddim_(Soul_Rebel_Sound_Presents)-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Count_Your_Blessings_Riddim_(Soul_Rebel_Sound_Presents)-WEB-2019-JAH"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Dance_Essentials_Vol_10-(RT265)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Dance_Essentials_Vol_10-(RT265)-WEB-2019-NDE"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Dance_Essentials_Vol_7-(RT263)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Dance_Essentials_Vol_7-(RT263)-WEB-2019-ZzZz"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Dance_Essentials_Vol_8-(RT231)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Dance_Essentials_Vol_8-(RT231)-WEB-2019-NDE"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Dancefloor_Hits_2019-(PDM688)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Dancefloor_Hits_2019-(PDM688)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Dance_Smash_Hits-(CAT273233)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Dance_Smash_Hits-(CAT273233)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Dance_Top_2018-(R2119)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Dance_Top_2018-(R2119)-WEB-2019-ZzZz"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Di_Realest_Acoustic_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Di_Realest_Acoustic_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_DJ_156_BPM_present_Speed_BPM_Remixes-(R2132)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_DJ_156_BPM_present_Speed_BPM_Remixes-(R2132)-WEB-2019-ZzZz"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Dream_Chaser_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Dream_Chaser_Riddim-WEB-2019-JAH"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Drivetime_Essentials_Vol_01-(HOTQDE001)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Drivetime_Essentials_Vol_01-(HOTQDE001)-WEB-2019-ENSLAVE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Dub_Wi_Luv_Riddim_(KraiGGi_BaDArT_Presents)-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Dub_Wi_Luv_Riddim_(KraiGGi_BaDArT_Presents)-WEB-2019-JAH"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "VA-Epilogue_2017-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/VA-Epilogue_2017-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "VA-Epilogue_2018-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/VA-Epilogue_2018-WEB-FR-2019-OND"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Festival_Anthems_Vol_4-(SNDCL019)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Festival_Anthems_Vol_4-(SNDCL019)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_FG_Top_10_January_2019-(FC051)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_FG_Top_10_January_2019-(FC051)-WEB-2019-ZzZz"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Fly_Weh_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Fly_Weh_Riddim-WEB-2019-RYG"
      },
      {
        "group": "MST",
        "lang": "",
        "name": "VA_-_Funkymix_239-WEB-2019-MST",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Funkymix_239-WEB-2019-MST"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Grandtime_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Grandtime_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Hard_Trance_Top_2018-(R2126)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Hard_Trance_Top_2018-(R2126)-WEB-2019-ZzZz"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Harvest_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Harvest_Riddim-WEB-2019-JAH"
      },
      {
        "group": "VOiCE",
        "lang": "",
        "name": "VA-House_Clubhits_Megamix_2019.1-3CD-2019-VOiCE",
        "year": 2019,
        "path": "vfs://saparNas/VA-House_Clubhits_Megamix_2019.1-3CD-2019-VOiCE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-In_Di_Street_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-In_Di_Street_Riddim-WEB-2019-JAH"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Italian_Bomb_Riddim_(Adriatic_Sound)-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Italian_Bomb_Riddim_(Adriatic_Sound)-WEB-2019-RYG"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Jab_Code_Riddim_20-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Jab_Code_Riddim_20-WEB-2019-JAH"
      },
      {
        "group": "VOiCE",
        "lang": "",
        "name": "VA-Kontor_Top_Of_The_Clubs_Vol.81-4CD-2019-VOiCE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Kontor_Top_Of_The_Clubs_Vol.81-4CD-2019-VOiCE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Limited_Edition_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Limited_Edition_Riddim-WEB-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "VA-Love_NB_Vol_2-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/VA-Love_NB_Vol_2-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Massive_B_Presents_Crime_Scene_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Massive_B_Presents_Crime_Scene_Riddim-WEB-2019-RYG"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Mayweather_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Mayweather_Riddim-WEB-2019-RYG"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Miami_Dance_Essentials_19-(MIR289)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Miami_Dance_Essentials_19-(MIR289)-WEB-2019-NDE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Money_Fantasy_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Money_Fantasy_Riddim-WEB-2019-RYG"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-More_Fyah_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-More_Fyah_Riddim-WEB-2019-JAH"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Motek_Best_of_2018-(MVA007)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Motek_Best_of_2018-(MVA007)-WEB-2019-ENSLAVE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-My_Favorite_DJ_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-My_Favorite_DJ_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Netswork_Top_Tunes_2019_Vol_8-(NWI1267)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Netswork_Top_Tunes_2019_Vol_8-(NWI1267)-WEB-2019-ZzZz"
      },
      {
        "group": "ENTiTLED",
        "lang": "",
        "name": "Vanguard-II-WEB-2019-ENTiTLED",
        "year": 2019,
        "path": "vfs://saparNas/Vanguard-II-WEB-2019-ENTiTLED"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Night_Bass_Remixed_Vol_2-(NBD078)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Night_Bass_Remixed_Vol_2-(NBD078)-WEB-2019-NDE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-No_Habla_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-No_Habla_Riddim-WEB-2019-RYG"
      },
      {
        "group": "iHR",
        "lang": "",
        "name": "VA-Nothing_But._Tech_House_Essentials_Vol_07-(NBTHE007)-WEB-2019-iHR",
        "year": 2019,
        "path": "vfs://saparNas/VA-Nothing_But._Tech_House_Essentials_Vol_07-(NBTHE007)-WEB-2019-iHR"
      },
      {
        "group": "FATHEAD",
        "lang": "",
        "name": "VA-Now_Thats_What_I_Call_Music_69-2019-FATHEAD",
        "year": 2019,
        "path": "vfs://saparNas/VA-Now_Thats_What_I_Call_Music_69-2019-FATHEAD"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Osaka_Riddim_(Soca_2019_Trinidad_And_Tobago_Carnival)-WEB-2018-RYG",
        "year": 2018,
        "path": "vfs://saparNas/VA-Osaka_Riddim_(Soca_2019_Trinidad_And_Tobago_Carnival)-WEB-2018-RYG"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-PETS_Recordings_Best_of_2018-(PETSDIG008)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-PETS_Recordings_Best_of_2018-(PETSDIG008)-WEB-2019-ENSLAVE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Pixel_Paradise_Remixed-(CR133R)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Pixel_Paradise_Remixed-(CR133R)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Progressive_Essentials-(BASE079)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Progressive_Essentials-(BASE079)-WEB-2019-NDE"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Psy_Trance_Top_2018-(R2122)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Psy_Trance_Top_2018-(R2122)-WEB-2019-ZzZz"
      },
      {
        "group": "FALCON",
        "lang": "",
        "name": "VA-Quintessence_Vol_2_Remix_Edition_Part_2-WEB-2019-FALCON",
        "year": 2019,
        "path": "vfs://saparNas/VA-Quintessence_Vol_2_Remix_Edition_Part_2-WEB-2019-FALCON"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Remixes_From_The_Vault-(MM159)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Remixes_From_The_Vault-(MM159)-WEB-2019-ENSLAVE"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Varnish_La_Piscine-Le_Regard_Qui_Tue-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Varnish_La_Piscine-Le_Regard_Qui_Tue-WEB-FR-2019-OND"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Rock_Top_2018-(R2127)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Rock_Top_2018-(R2127)-WEB-2019-ZzZz"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-RRR_Best_Of_2017-2018-(RRR063)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-RRR_Best_Of_2017-2018-(RRR063)-WEB-2019-ENSLAVE"
      },
      {
        "group": "BB8",
        "lang": "",
        "name": "VA-SCI_TEC_Best_of_2018-(TEC_200)-WEB-2019-BB8",
        "year": 2019,
        "path": "vfs://saparNas/VA-SCI_TEC_Best_of_2018-(TEC_200)-WEB-2019-BB8"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Simon_Say_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Simon_Say_Riddim-WEB-2019-RYG"
      },
      {
        "group": "JAH",
        "lang": "FR",
        "name": "VA-Simple_Reggae_Riddim-WEB-FR-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Simple_Reggae_Riddim-WEB-FR-2019-JAH"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Skyline_Keys_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Skyline_Keys_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-Soundteller_Best_of_2018-(ST2018)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Soundteller_Best_of_2018-(ST2018)-WEB-2019-ENSLAVE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Steppa_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Steppa_Riddim-WEB-2019-RYG"
      },
      {
        "group": "FALCON",
        "lang": "",
        "name": "VA-Stimulating_Movements-WEB-2019-FALCON",
        "year": 2019,
        "path": "vfs://saparNas/VA-Stimulating_Movements-WEB-2019-FALCON"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Strictly_The_Best_Vol_58-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Strictly_The_Best_Vol_58-WEB-2019-RYG"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Strictly_The_Best_Vol_59-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Strictly_The_Best_Vol_59-WEB-2019-RYG"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Sweep_It_Out_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Sweep_It_Out_Riddim-WEB-2019-RYG"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "VA-Talent_Cache-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/VA-Talent_Cache-WEB-FR-2019-OND"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Tanty_Patsy_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Tanty_Patsy_Riddim-WEB-2019-RYG"
      },
      {
        "group": "ENTANGLE",
        "lang": "",
        "name": "VA-The_Best_2K18_II-(VPTRCD014)-WEB-2019-ENTANGLE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_2K18_II-(VPTRCD014)-WEB-2019-ENTANGLE"
      },
      {
        "group": "ENTANGLE",
        "lang": "",
        "name": "VA-The_Best_2K18-(VPTRCD013)-WEB-2019-ENTANGLE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_2K18-(VPTRCD013)-WEB-2019-ENTANGLE"
      },
      {
        "group": "BF",
        "lang": "",
        "name": "VA-The_Best_Of_Chill_Out_2019_Vol_01-(IBL169)-WEB-2019-BF",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_Of_Chill_Out_2019_Vol_01-(IBL169)-WEB-2019-BF"
      },
      {
        "group": "iHR",
        "lang": "",
        "name": "VA-The_Best_Of_Sci-Fi_Music_2018-(EDM008)-WEB-2019-iHR",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_Of_Sci-Fi_Music_2018-(EDM008)-WEB-2019-iHR"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-The_Best_Of_Serious_Things_2018-(735119001388)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_Of_Serious_Things_2018-(735119001388)-WEB-2019-NDE"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "VA_-_The_Best_Of_Spoontech_Year_8-(SPOONCOMP008)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_The_Best_Of_Spoontech_Year_8-(SPOONCOMP008)-WEB-2019-MMS"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-The_Best_of_Sub_2018-(SVC008)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_of_Sub_2018-(SVC008)-WEB-2019-ENSLAVE"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-The_Best_Of_The_West-(WWR019)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_Of_The_West-(WWR019)-WEB-2019-ENSLAVE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-The_Best_Of_Twerk_Music_2018-(EDM007)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Best_Of_Twerk_Music_2018-(EDM007)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-The_Essentials-(FPR420)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Essentials-(FPR420)-WEB-2019-NDE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-The_Ital_Grade_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Ital_Grade_Riddim-WEB-2019-JAH"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-The_Remixes_(Air)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Remixes_(Air)-WEB-2019-ENSLAVE"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-The_Run_Fi_Cover_Remixes-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-The_Run_Fi_Cover_Remixes-WEB-2019-JAH"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Top_40_Drops_Winter_19-(MIR285)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Top_40_Drops_Winter_19-(MIR285)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Top_5_Progressive_Trance_2-(4LR068)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Top_5_Progressive_Trance_2-(4LR068)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Top_5_Progressive_Trance-(4LR067)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Top_5_Progressive_Trance-(4LR067)-WEB-2019-ZzZz"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Top_Freedom_Music_January_2019-(MM278)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Top_Freedom_Music_January_2019-(MM278)-WEB-2019-ZzZz"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "VA-Trailer_Truck_Riddim-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/VA-Trailer_Truck_Riddim-WEB-2019-JAH"
      },
      {
        "group": "MMS",
        "lang": "",
        "name": "VA_-_Trance_Top_1000_The_Legends-(ARDI4070)-WEB-2019-MMS",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Trance_Top_1000_The_Legends-(ARDI4070)-WEB-2019-MMS"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Tree_Of_Life_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Tree_Of_Life_Riddim-WEB-2019-RYG"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-Tropical_Lime_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Tropical_Lime_Riddim-WEB-2019-RYG"
      },
      {
        "group": "RYG",
        "lang": "FR",
        "name": "VA-Trouble_Dance_Riddim-WEB-FR-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-Trouble_Dance_Riddim-WEB-FR-2019-RYG"
      },
      {
        "group": "JUSTiFY",
        "lang": "",
        "name": "VA-Underground_Psy_Trance_Anthems_Vol._06-(LWUPTA06)-WEB-2019-JUSTiFY",
        "year": 2019,
        "path": "vfs://saparNas/VA-Underground_Psy_Trance_Anthems_Vol._06-(LWUPTA06)-WEB-2019-JUSTiFY"
      },
      {
        "group": "BB8",
        "lang": "",
        "name": "VA-VFR_Best_Of_2018-(VFR_055)-WEB-2019-BB8",
        "year": 2019,
        "path": "vfs://saparNas/VA-VFR_Best_Of_2018-(VFR_055)-WEB-2019-BB8"
      },
      {
        "group": "ZzZz",
        "lang": "",
        "name": "VA_-_Vocal_Top_2018-(R2128)-WEB-2019-ZzZz",
        "year": 2019,
        "path": "vfs://saparNas/VA_-_Vocal_Top_2018-(R2128)-WEB-2019-ZzZz"
      },
      {
        "group": "ENSLAVE",
        "lang": "",
        "name": "VA-We_Are_The_Seed_(The_Best_of_2018)-WEB-2019-ENSLAVE",
        "year": 2019,
        "path": "vfs://saparNas/VA-We_Are_The_Seed_(The_Best_of_2018)-WEB-2019-ENSLAVE"
      },
      {
        "group": "RYG",
        "lang": "",
        "name": "VA-We_Pumpin_Riddim-WEB-2019-RYG",
        "year": 2019,
        "path": "vfs://saparNas/VA-We_Pumpin_Riddim-WEB-2019-RYG"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Winter_Essentials_19-(FR353)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Winter_Essentials_19-(FR353)-WEB-2019-NDE"
      },
      {
        "group": "NDE",
        "lang": "",
        "name": "VA-Winter_Music_Top_1-(RT276)-WEB-2019-NDE",
        "year": 2019,
        "path": "vfs://saparNas/VA-Winter_Music_Top_1-(RT276)-WEB-2019-NDE"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Velns-Sombre-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Velns-Sombre-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Victor_Le_Douarec-Les_Fruits_De_La_Patience-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Victor_Le_Douarec-Les_Fruits_De_La_Patience-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Vil_Squal-Vil_Et_Pak_(Feat_Pakis)-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Vil_Squal-Vil_Et_Pak_(Feat_Pakis)-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "VIMS_LUIIVII-Revelation_Part_1-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/VIMS_LUIIVII-Revelation_Part_1-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Vince_Terranova-Rien_A_Perdre-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Vince_Terranova-Rien_A_Perdre-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Virus_Doudou-12_Coups-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Virus_Doudou-12_Coups-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Vrax-Linattendu-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Vrax-Linattendu-WEB-FR-2019-OND"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Vybz_Kartel-Come_Home-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Vybz_Kartel-Come_Home-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Vybz_Kartel-Massive_B_Presents_Pandora-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Vybz_Kartel-Massive_B_Presents_Pandora-WEB-2019-JAH"
      },
      {
        "group": "JAH",
        "lang": "",
        "name": "Vybz_Kartel-Weh_Daddy_Deh-SINGLE-WEB-2019-JAH",
        "year": 2019,
        "path": "vfs://saparNas/Vybz_Kartel-Weh_Daddy_Deh-SINGLE-WEB-2019-JAH"
      },
      {
        "group": "sceau",
        "lang": "FR",
        "name": "Walid_Shabazz-Audiophanatic_2-WEB-FR-2019-sceau",
        "year": 2019,
        "path": "vfs://saparNas/Walid_Shabazz-Audiophanatic_2-WEB-FR-2019-sceau"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Wazacrew-Tout_Pour_Le_Crew_(T.P.L.C.)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Wazacrew-Tout_Pour_Le_Crew_(T.P.L.C.)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "WhyBee-A_Ton_Avis-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/WhyBee-A_Ton_Avis-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "WINII-La_Monnaie-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/WINII-La_Monnaie-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "XV-La_Onda-REPACK-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/XV-La_Onda-REPACK-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "XV-La_Onda-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/XV-La_Onda-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yannick_Fabregue-Mon_Ile-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yannick_Fabregue-Mon_Ile-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yans-Ciel-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yans-Ciel-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yseult-Rien_A_Prouver-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yseult-Rien_A_Prouver-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yves_Montand-Bouse-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yves_Montand-Bouse-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yves_Montand-Ho_Ho_Ho-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yves_Montand-Ho_Ho_Ho-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yves_Montand-Listen_This_Music-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yves_Montand-Listen_This_Music-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Yzla-Toc_Toc_(Prisme_1)-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Yzla-Toc_Toc_(Prisme_1)-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "AZF",
        "lang": "FR",
        "name": "Zaga_Bambo-Celebrer-SINGLE-WEB-FR-2019-AZF",
        "year": 2019,
        "path": "vfs://saparNas/Zaga_Bambo-Celebrer-SINGLE-WEB-FR-2019-AZF"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Zepeck_Tauraux-Puissance_Sauvage_2-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Zepeck_Tauraux-Puissance_Sauvage_2-SINGLE-WEB-FR-2019-OND"
      },
      {
        "group": "OND",
        "lang": "FR",
        "name": "Zola-Booska_Rocket-SINGLE-WEB-FR-2019-OND",
        "year": 2019,
        "path": "vfs://saparNas/Zola-Booska_Rocket-SINGLE-WEB-FR-2019-OND"
      }
    ];
    return {nodes};
  }

  // Overrides the genId method to ensure that a hero always has an id.
  // If the heroes array is empty,
  // the method below returns the initial number (11).
  // if the heroes array is not empty, the method below returns the highest
  // hero id + 1.
  // genId(nodes: Node[]): number {
  //   return node.length > 0 ? Math.max(...nodes.map(node => node.id)) + 1 : 11;
  // }
}
