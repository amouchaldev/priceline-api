<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['id' => 1, 'name' => 'Aïn Harrouda', 'region_id' => 6],
            ['id' => 2, 'name' => 'Ben Yakhlef', 'region_id' => 6],
            ['id' => 3, 'name' => 'Bouskoura', 'region_id' => 6],
            ['id' => 4, 'name' => 'Casablanca', 'region_id' => 6],
            ['id' => 5, 'name' => 'Médiouna', 'region_id' => 6],
            ['id' => 6, 'name' => 'Mohammadia', 'region_id' => 6],
            ['id' => 7, 'name' => 'Tit Mellil', 'region_id' => 6],
            ['id' => 8, 'name' => 'Ben Yakhlef', 'region_id' => 6],
            ['id' => 9, 'name' => 'Bejaâd', 'region_id' => 5],
            ['id' => 10, 'name' => 'Ben Ahmed', 'region_id' => 6],
            ['id' => 11, 'name' => 'Benslimane', 'region_id' => 6],
            ['id' => 12, 'name' => 'Berrechid', 'region_id' => 6],
            ['id' => 13, 'name' => 'Boujniba', 'region_id' => 5],
            ['id' => 14, 'name' => 'Boulanouare', 'region_id' => 5],
            ['id' => 15, 'name' => 'Bouznika', 'region_id' => 6],
            ['id' => 16, 'name' => 'Deroua', 'region_id' => 6],
            ['id' => 17, 'name' => 'El Borouj', 'region_id' => 6],
            ['id' => 18, 'name' => 'El Gara', 'region_id' => 6],
            ['id' => 19, 'name' => 'Guisser', 'region_id' => 6],
            ['id' => 20, 'name' => 'Hattane', 'region_id' => 5],
            ['id' => 21, 'name' => 'Khouribga', 'region_id' => 5],
            ['id' => 22, 'name' => 'Loulad', 'region_id' => 6],
            ['id' => 23, 'name' => 'Oued Zem', 'region_id' => 5],
            ['id' => 24, 'name' => 'Oulad Abbou', 'region_id' => 6],
            ['id' => 25, 'name' => 'Oulad H\'Riz Sahel', 'region_id' => 6],
            ['id' => 26, 'name' => 'Oulad M\'rah', 'region_id' => 6],
            ['id' => 27, 'name' => 'Oulad Saïd', 'region_id' => 6],
            ['id' => 28, 'name' => 'Oulad Sidi Ben Daoud', 'region_id' => 6],
            ['id' => 29, 'name' => 'Ras El Aïn', 'region_id' => 6],
            ['id' => 30, 'name' => 'Settat', 'region_id' => 6],
            ['id' => 31, 'name' => 'Sidi Rahhal Chataï', 'region_id' => 6],
            ['id' => 32, 'name' => 'Soualem', 'region_id' => 6],
            ['id' => 33, 'name' => 'Azemmour', 'region_id' => 6],
            ['id' => 34, 'name' => 'Bir Jdid', 'region_id' => 6],
            ['id' => 35, 'name' => 'Bouguedra', 'region_id' => 7],
            ['id' => 36, 'name' => 'Echemmaia', 'region_id' => 7],
            ['id' => 37, 'name' => 'El Jadida', 'region_id' => 6],
            ['id' => 38, 'name' => 'Hrara', 'region_id' => 7],
            ['id' => 39, 'name' => 'Ighoud', 'region_id' => 7],
            ['id' => 40, 'name' => 'Jamâat Shaim', 'region_id' => 7],
            ['id' => 41, 'name' => 'Jorf Lasfar', 'region_id' => 6],
            ['id' => 42, 'name' => 'Khemis Zemamra', 'region_id' => 6],
            ['id' => 43, 'name' => 'Laaounate', 'region_id' => 6],
            ['id' => 44, 'name' => 'Moulay Abdallah', 'region_id' => 6],
            ['id' => 45, 'name' => 'Oualidia', 'region_id' => 6],
            ['id' => 46, 'name' => 'Oulad Amrane', 'region_id' => 6],
            ['id' => 47, 'name' => 'Oulad Frej', 'region_id' => 6],
            ['id' => 48, 'name' => 'Oulad Ghadbane', 'region_id' => 6],
            ['id' => 49, 'name' => 'Safi', 'region_id' => 7],
            ['id' => 50, 'name' => 'Sebt El Maârif', 'region_id' => 6],
            ['id' => 51, 'name' => 'Sebt Gzoula', 'region_id' => 7],
            ['id' => 52, 'name' => 'Sidi Ahmed', 'region_id' => 7],
            ['id' => 53, 'name' => 'Sidi Ali Ban Hamdouche', 'region_id' => 6],
            ['id' => 54, 'name' => 'Sidi Bennour', 'region_id' => 6],
            ['id' => 55, 'name' => 'Sidi Bouzid', 'region_id' => 6],
            ['id' => 56, 'name' => 'Sidi Smaïl', 'region_id' => 6],
            ['id' => 57, 'name' => 'Youssoufia', 'region_id' => 7],
            ['id' => 58, 'name' => 'Fès', 'region_id' => 3],
            ['id' => 59, 'name' => 'Aïn Cheggag', 'region_id' => 3],
            ['id' => 60, 'name' => 'Bhalil', 'region_id' => 3],
            ['id' => 61, 'name' => 'Boulemane', 'region_id' => 3],
            ['id' => 62, 'name' => 'El Menzel', 'region_id' => 3],
            ['id' => 63, 'name' => 'Guigou', 'region_id' => 3],
            ['id' => 64, 'name' => 'Imouzzer Kandar', 'region_id' => 3],
            ['id' => 65, 'name' => 'Imouzzer Marmoucha', 'region_id' => 3],
            ['id' => 66, 'name' => 'Missour', 'region_id' => 3],
            ['id' => 67, 'name' => 'Moulay Yaâcoub', 'region_id' => 3],
            ['id' => 68, 'name' => 'Ouled Tayeb', 'region_id' => 3],
            ['id' => 69, 'name' => 'Outat El Haj', 'region_id' => 3],
            ['id' => 70, 'name' => 'Ribate El Kheir', 'region_id' => 3],
            ['id' => 71, 'name' => 'Séfrou', 'region_id' => 3],
            ['id' => 72, 'name' => 'Skhinate', 'region_id' => 3],
            ['id' => 73, 'name' => 'Tafajight', 'region_id' => 3],
            ['id' => 74, 'name' => 'Arbaoua', 'region_id' => 4],
            ['id' => 75, 'name' => 'Aïn Dorij', 'region_id' => 1],
            ['id' => 76, 'name' => 'Dar Gueddari', 'region_id' => 4],
            ['id' => 77, 'name' => 'Had Kourt', 'region_id' => 4],
            ['id' => 78, 'name' => 'Jorf El Melha', 'region_id' => 4],
            ['id' => 79, 'name' => 'Kénitra', 'region_id' => 4],
            ['id' => 80, 'name' => 'Khenichet', 'region_id' => 4],
            ['id' => 81, 'name' => 'Lalla Mimouna', 'region_id' => 4],
            ['id' => 82, 'name' => 'Mechra Bel Ksiri', 'region_id' => 4],
            ['id' => 83, 'name' => 'Mehdia', 'region_id' => 4],
            ['id' => 84, 'name' => 'Moulay Bousselham', 'region_id' => 4],
            ['id' => 85, 'name' => 'Sidi Allal Tazi', 'region_id' => 4],
            ['id' => 86, 'name' => 'Sidi Kacem', 'region_id' => 4],
            ['id' => 87, 'name' => 'Sidi Slimane', 'region_id' => 4],
            ['id' => 88, 'name' => 'Sidi Taibi', 'region_id' => 4],
            ['id' => 89, 'name' => 'Sidi Yahya El Gharb', 'region_id' => 4],
            ['id' => 90, 'name' => 'Souk El Arbaa', 'region_id' => 4],
            ['id' => 91, 'name' => 'Akka', 'region_id' => 9],
            ['id' => 92, 'name' => 'Assa', 'region_id' => 10],
            ['id' => 93, 'name' => 'Bouizakarne', 'region_id' => 10],
            ['id' => 94, 'name' => 'El Ouatia', 'region_id' => 10],
            ['id' => 95, 'name' => 'Es-Semara', 'region_id' => 1],
            ['id' => 96, 'name' => 'Fam El Hisn', 'region_id' => 9],
            ['id' => 97, 'name' => 'Foum Zguid', 'region_id' => 9],
            ['id' => 98, 'name' => 'Guelmim', 'region_id' => 10],
            ['id' => 99, 'name' => 'Taghjijt', 'region_id' => 10],
            ['id' => 100, 'name' => 'Tan-Tan', 'region_id' => 10],
            ['id' => 101, 'name' => 'Tata', 'region_id' => 9],
            ['id' => 102, 'name' => 'Zag', 'region_id' => 10],
            ['id' => 103, 'name' => 'Marrakech', 'region_id' => 7],
            ['id' => 104, 'name' => 'Ait Daoud', 'region_id' => 7],
            ['id' => 115, 'name' => 'Amizmiz', 'region_id' => 7],
            ['id' => 116, 'name' => 'Assahrij', 'region_id' => 7],
            ['id' => 117, 'name' => 'Aït Ourir', 'region_id' => 7],
            ['id' => 118, 'name' => 'Ben Guerir', 'region_id' => 7],
            ['id' => 119, 'name' => 'Chichaoua', 'region_id' => 7],
            ['id' => 120, 'name' => 'El Hanchane', 'region_id' => 7],
            ['id' => 121, 'name' => 'El Kelaâ des Sraghna', 'region_id' => 7],
            ['id' => 122, 'name' => 'Essaouira', 'region_id' => 7],
            ['id' => 123, 'name' => 'Fraïta', 'region_id' => 7],
            ['id' => 124, 'name' => 'Ghmate', 'region_id' => 7],
            ['id' => 125, 'name' => 'Ighounane', 'region_id' => 6],
            ['id' => 126, 'name' => 'Imintanoute', 'region_id' => 7],
            ['id' => 127, 'name' => 'Kattara', 'region_id' => 7],
            ['id' => 128, 'name' => 'Lalla Takerkoust', 'region_id' => 7],
            ['id' => 129, 'name' => 'Loudaya', 'region_id' => 7],
            ['id' => 130, 'name' => 'Lâattaouia', 'region_id' => 7],
            ['id' => 131, 'name' => 'Moulay Brahim', 'region_id' => 7],
            ['id' => 132, 'name' => 'Mzouda', 'region_id' => 7],
            ['id' => 133, 'name' => 'Ounagha', 'region_id' => 7],
            ['id' => 134, 'name' => 'Sid L\'Mokhtar', 'region_id' => 7],
            ['id' => 135, 'name' => 'Sid Zouin', 'region_id' => 7],
            ['id' => 136, 'name' => 'Sidi Abdallah Ghiat', 'region_id' => 7],
            ['id' => 137, 'name' => 'Sidi Bou Othmane', 'region_id' => 7],
            ['id' => 138, 'name' => 'Sidi Rahhal', 'region_id' => 7],
            ['id' => 139, 'name' => 'Skhour Rehamna', 'region_id' => 7],
            ['id' => 140, 'name' => 'Smimou', 'region_id' => 7],
            ['id' => 141, 'name' => 'Tafetachte', 'region_id' => 7],
            ['id' => 142, 'name' => 'Tahannaout', 'region_id' => 7],
            ['id' => 143, 'name' => 'Talmest', 'region_id' => 7],
            ['id' => 144, 'name' => 'Tamallalt', 'region_id' => 7],
            ['id' => 145, 'name' => 'Tamanar', 'region_id' => 7],
            ['id' => 146, 'name' => 'Tamansourt', 'region_id' => 7],
            ['id' => 147, 'name' => 'Tameslouht', 'region_id' => 7],
            ['id' => 148, 'name' => 'Tanalt', 'region_id' => 9],
            ['id' => 149, 'name' => 'Zeubelemok', 'region_id' => 7],
            ['id' => 150, 'name' => 'Meknès', 'region_id' => 3],
            ['id' => 151, 'name' => 'Khénifra', 'region_id' => 5],
            ['id' => 152, 'name' => 'Agourai', 'region_id' => 3],
            ['id' => 153, 'name' => 'Ain Taoujdate', 'region_id' => 3],
            ['id' => 154, 'name' => 'MyAliCherif', 'region_id' => 6],
            ['id' => 155, 'name' => 'Rissani', 'region_id' => 6],
            ['id' => 156, 'name' => 'Amalou Ighriben', 'region_id' => 5],
            ['id' => 157, 'name' => 'Aoufous', 'region_id' => 6],
            ['id' => 158, 'name' => 'Arfoud', 'region_id' => 6],
            ['id' => 159, 'name' => 'Azrou', 'region_id' => 3],
            ['id' => 160, 'name' => 'Aïn Jemaa', 'region_id' => 3],
            ['id' => 161, 'name' => 'Aïn Karma', 'region_id' => 3],
            ['id' => 162, 'name' => 'Aïn Leuh', 'region_id' => 3],
            ['id' => 163, 'name' => 'Aït Boubidmane', 'region_id' => 3],
            ['id' => 164, 'name' => 'Aït Ishaq', 'region_id' => 5],
            ['id' => 165, 'name' => 'Boudnib', 'region_id' => 6],
            ['id' => 166, 'name' => 'Boufakrane', 'region_id' => 3],
            ['id' => 167, 'name' => 'Boumia', 'region_id' => 6],
            ['id' => 168, 'name' => 'El Hajeb', 'region_id' => 3],
            ['id' => 169, 'name' => 'Elkbab', 'region_id' => 5],
            ['id' => 170, 'name' => 'Er-Rich', 'region_id' => 5],
            ['id' => 171, 'name' => 'Errachidia', 'region_id' => 6],
            ['id' => 172, 'name' => 'Gardmit', 'region_id' => 6],
            ['id' => 173, 'name' => 'Goulmima', 'region_id' => 6],
            ['id' => 174, 'name' => 'Gourrama', 'region_id' => 6],
            ['id' => 175, 'name' => 'Had Bouhssoussen', 'region_id' => 5],
            ['id' => 176, 'name' => 'Haj Kaddour', 'region_id' => 3],
            ['id' => 177, 'name' => 'Ifrane', 'region_id' => 3],
            ['id' => 178, 'name' => 'Itzer', 'region_id' => 6],
            ['id' => 179, 'name' => 'Jorf', 'region_id' => 6],
            ['id' => 180, 'name' => 'Kehf Nsour', 'region_id' => 5],
            ['id' => 181, 'name' => 'Kerrouchen', 'region_id' => 5],
            ['id' => 182, 'name' => 'M\'haya', 'region_id' => 3],
            ['id' => 183, 'name' => 'M\'rirt', 'region_id' => 5],
            ['id' => 184, 'name' => 'Midelt', 'region_id' => 6],
            ['id' => 185, 'name' => 'Moulay Ali Cherif', 'region_id' => 6],
            ['id' => 186, 'name' => 'Moulay Bouazza', 'region_id' => 5],
            ['id' => 187, 'name' => 'Moulay Idriss Zerhoun', 'region_id' => 3],
            ['id' => 188, 'name' => 'Moussaoua', 'region_id' => 3],
            ['id' => 189, 'name' => 'N\'Zalat Bni Amar', 'region_id' => 3],
            ['id' => 190, 'name' => 'Ouaoumana', 'region_id' => 5],
            ['id' => 191, 'name' => 'Oued Ifrane', 'region_id' => 3],
            ['id' => 192, 'name' => 'Sabaa Aiyoun', 'region_id' => 3],
            ['id' => 193, 'name' => 'Sebt Jahjouh', 'region_id' => 3],
            ['id' => 194, 'name' => 'Sidi Addi', 'region_id' => 3],
            ['id' => 195, 'name' => 'Tichoute', 'region_id' => 6],
            ['id' => 196, 'name' => 'Tighassaline', 'region_id' => 5],
            ['id' => 197, 'name' => 'Tighza', 'region_id' => 5],
            ['id' => 198, 'name' => 'Timahdite', 'region_id' => 3],
            ['id' => 199, 'name' => 'Tinejdad', 'region_id' => 6],
            ['id' => 200, 'name' => 'Tizguite', 'region_id' => 3],
            ['id' => 201, 'name' => 'Toulal', 'region_id' => 3],
            ['id' => 202, 'name' => 'Tounfite', 'region_id' => 6],
            ['id' => 203, 'name' => 'Zaouia d\'Ifrane', 'region_id' => 3],
            ['id' => 204, 'name' => 'Zaïda', 'region_id' => 6],
            ['id' => 205, 'name' => 'Ahfir', 'region_id' => 2],
            ['id' => 206, 'name' => 'Aklim', 'region_id' => 2],
            ['id' => 207, 'name' => 'Al Aroui', 'region_id' => 2],
            ['id' => 208, 'name' => 'Aïn Bni Mathar', 'region_id' => 2],
            ['id' => 209, 'name' => 'Aïn Erreggada', 'region_id' => 2],
            ['id' => 210, 'name' => 'Ben Taïeb', 'region_id' => 2],
            ['id' => 211, 'name' => 'Berkane', 'region_id' => 2],
            ['id' => 212, 'name' => 'Bni Ansar', 'region_id' => 2],
            ['id' => 213, 'name' => 'Bni Chiker', 'region_id' => 2],
            ['id' => 214, 'name' => 'Bni Drar', 'region_id' => 2],
            ['id' => 215, 'name' => 'Bni Tadjite', 'region_id' => 2],
            ['id' => 216, 'name' => 'Bouanane', 'region_id' => 2],
            ['id' => 217, 'name' => 'Bouarfa', 'region_id' => 2],
            ['id' => 218, 'name' => 'Bouhdila', 'region_id' => 2],
            ['id' => 219, 'name' => 'Dar El Kebdani', 'region_id' => 2],
            ['id' => 220, 'name' => 'Debdou', 'region_id' => 2],
            ['id' => 221, 'name' => 'Douar Kannine', 'region_id' => 2],
            ['id' => 222, 'name' => 'Driouch', 'region_id' => 2],
            ['id' => 223, 'name' => 'El Aïoun Sidi Mellouk', 'region_id' => 2],
            ['id' => 224, 'name' => 'Farkhana', 'region_id' => 2],
            ['id' => 225, 'name' => 'Figuig', 'region_id' => 2],
            ['id' => 226, 'name' => 'Ihddaden', 'region_id' => 2],
            ['id' => 227, 'name' => 'Jaâdar', 'region_id' => 2],
            ['id' => 228, 'name' => 'Jerada', 'region_id' => 2],
            ['id' => 229, 'name' => 'Kariat Arekmane', 'region_id' => 2],
            ['id' => 230, 'name' => 'Kassita', 'region_id' => 2],
            ['id' => 231, 'name' => 'Kerouna', 'region_id' => 2],
            ['id' => 232, 'name' => 'Laâtamna', 'region_id' => 2],
            ['id' => 233, 'name' => 'Madagh', 'region_id' => 2],
            ['id' => 234, 'name' => 'Midar', 'region_id' => 2],
            ['id' => 235, 'name' => 'Nador', 'region_id' => 2],
            ['id' => 236, 'name' => 'Naima', 'region_id' => 2],
            ['id' => 237, 'name' => 'Oued Heimer', 'region_id' => 2],
            ['id' => 238, 'name' => 'Oujda', 'region_id' => 2],
            ['id' => 239, 'name' => 'Ras El Ma', 'region_id' => 2],
            ['id' => 240, 'name' => 'Saïdia', 'region_id' => 2],
            ['id' => 241, 'name' => 'Selouane', 'region_id' => 2],
            ['id' => 242, 'name' => 'Sidi Boubker', 'region_id' => 2],
            ['id' => 243, 'name' => 'Sidi Slimane Echcharaa', 'region_id' => 2],
            ['id' => 244, 'name' => 'Talsint', 'region_id' => 2],
            ['id' => 245, 'name' => 'Taourirt', 'region_id' => 2],
            ['id' => 246, 'name' => 'Tendrara', 'region_id' => 2],
            ['id' => 247, 'name' => 'Tiztoutine', 'region_id' => 2],
            ['id' => 248, 'name' => 'Touima', 'region_id' => 2],
            ['id' => 249, 'name' => 'Touissit', 'region_id' => 2],
            ['id' => 250, 'name' => 'Zaïo', 'region_id' => 2],
            ['id' => 251, 'name' => 'Zeghanghane', 'region_id' => 2],
            ['id' => 252, 'name' => 'Rabat', 'region_id' => 4],
            ['id' => 253, 'name' => 'Salé', 'region_id' => 4],
            ['id' => 254, 'name' => 'Ain El Aouda', 'region_id' => 4],
            ['id' => 255, 'name' => 'Harhoura', 'region_id' => 4],
            ['id' => 256, 'name' => 'Khémisset', 'region_id' => 4],
            ['id' => 257, 'name' => 'Oulmès', 'region_id' => 4],
            ['id' => 258, 'name' => 'Rommani', 'region_id' => 4],
            ['id' => 259, 'name' => 'Sidi Allal El Bahraoui', 'region_id' => 4],
            ['id' => 260, 'name' => 'Sidi Bouknadel', 'region_id' => 4],
            ['id' => 261, 'name' => 'Skhirate', 'region_id' => 4],
            ['id' => 262, 'name' => 'Tamesna', 'region_id' => 4],
            ['id' => 263, 'name' => 'Témara', 'region_id' => 4],
            ['id' => 264, 'name' => 'Tiddas', 'region_id' => 4],
            ['id' => 265, 'name' => 'Tiflet', 'region_id' => 4],
            ['id' => 266, 'name' => 'Touarga', 'region_id' => 4],
            ['id' => 267, 'name' => 'Agadir', 'region_id' => 9],
            ['id' => 268, 'name' => 'Agdz', 'region_id' => 6],
            ['id' => 269, 'name' => 'Agni Izimmer', 'region_id' => 9],
            ['id' => 270, 'name' => 'Aït Melloul', 'region_id' => 9],
            ['id' => 271, 'name' => 'Alnif', 'region_id' => 6],
            ['id' => 272, 'name' => 'Anzi', 'region_id' => 9],
            ['id' => 273, 'name' => 'Aoulouz', 'region_id' => 9],
            ['id' => 274, 'name' => 'Aourir', 'region_id' => 9],
            ['id' => 275, 'name' => 'Arazane', 'region_id' => 9],
            ['id' => 276, 'name' => 'Aït Baha', 'region_id' => 9],
            ['id' => 277, 'name' => 'Aït Iaâza', 'region_id' => 9],
            ['id' => 278, 'name' => 'Aït Yalla', 'region_id' => 6],
            ['id' => 279, 'name' => 'Ben Sergao', 'region_id' => 9],
            ['id' => 280, 'name' => 'Biougra', 'region_id' => 9],
            ['id' => 281, 'name' => 'Boumalne-Dadès', 'region_id' => 6],
            ['id' => 282, 'name' => 'Dcheira El Jihadia', 'region_id' => 9],
            ['id' => 283, 'name' => 'Drargua', 'region_id' => 9],
            ['id' => 284, 'name' => 'El Guerdane', 'region_id' => 9],
            ['id' => 285, 'name' => 'Harte Lyamine', 'region_id' => 6],
            ['id' => 286, 'name' => 'Ida Ougnidif', 'region_id' => 9],
            ['id' => 287, 'name' => 'Ifri', 'region_id' => 6],
            ['id' => 288, 'name' => 'Igdamen', 'region_id' => 9],
            ['id' => 289, 'name' => 'Ighil n\'Oumgoun', 'region_id' => 6],
            ['id' => 290, 'name' => 'Imassine', 'region_id' => 6],
            ['id' => 291, 'name' => 'Inezgane', 'region_id' => 9],
            ['id' => 292, 'name' => 'Irherm', 'region_id' => 9],
            ['id' => 293, 'name' => 'Kelaat-M\'Gouna', 'region_id' => 6],
            ['id' => 294, 'name' => 'Lakhsas', 'region_id' => 9],
            ['id' => 295, 'name' => 'Lakhsass', 'region_id' => 9],
            ['id' => 296, 'name' => 'Lqliâa', 'region_id' => 9],
            ['id' => 297, 'name' => 'M\'semrir', 'region_id' => 6],
            ['id' => 298, 'name' => 'Massa', 'region_id' => 9],
            ['id' => 299, 'name' => 'Megousse', 'region_id' => 9],
            ['id' => 300, 'name' => 'Ouarzazate', 'region_id' => 6],
            ['id' => 301, 'name' => 'Oulad Berhil', 'region_id' => 9],
            ['id' => 302, 'name' => 'Oulad Teïma', 'region_id' => 9],
            ['id' => 303, 'name' => 'Sarghine', 'region_id' => 6],
            ['id' => 304, 'name' => 'Sidi Ifni', 'region_id' => 10],
            ['id' => 305, 'name' => 'Skoura', 'region_id' => 6],
            ['id' => 306, 'name' => 'Tabounte', 'region_id' => 6],
            ['id' => 307, 'name' => 'Tafraout', 'region_id' => 9],
            ['id' => 308, 'name' => 'Taghzout', 'region_id' => 1],
            ['id' => 309, 'name' => 'Tagzen', 'region_id' => 9],
            ['id' => 310, 'name' => 'Taliouine', 'region_id' => 9],
            ['id' => 311, 'name' => 'Tamegroute', 'region_id' => 6],
            ['id' => 312, 'name' => 'Tamraght', 'region_id' => 9],
            ['id' => 313, 'name' => 'Tanoumrite Nkob Zagora', 'region_id' => 6],
            ['id' => 314, 'name' => 'Taourirt ait zaghar', 'region_id' => 6],
            ['id' => 315, 'name' => 'Taroudannt', 'region_id' => 9],
            ['id' => 316, 'name' => 'Temsia', 'region_id' => 9],
            ['id' => 317, 'name' => 'Tifnit', 'region_id' => 9],
            ['id' => 318, 'name' => 'Tisgdal', 'region_id' => 9],
            ['id' => 319, 'name' => 'Tiznit', 'region_id' => 9],
            ['id' => 320, 'name' => 'Toundoute', 'region_id' => 6],
            ['id' => 321, 'name' => 'Zagora', 'region_id' => 6],
            ['id' => 322, 'name' => 'Afourar', 'region_id' => 5],
            ['id' => 323, 'name' => 'Aghbala', 'region_id' => 5],
            ['id' => 324, 'name' => 'Azilal', 'region_id' => 5],
            ['id' => 325, 'name' => 'Aït Majden', 'region_id' => 5],
            ['id' => 326, 'name' => 'Beni Ayat', 'region_id' => 5],
            ['id' => 327, 'name' => 'Béni Mellal', 'region_id' => 5],
            ['id' => 328, 'name' => 'Bin elouidane', 'region_id' => 5],
            ['id' => 329, 'name' => 'Bradia', 'region_id' => 5],
            ['id' => 330, 'name' => 'Bzou', 'region_id' => 5],
            ['id' => 331, 'name' => 'Dar Oulad Zidouh', 'region_id' => 5],
            ['id' => 332, 'name' => 'Demnate', 'region_id' => 5],
            ['id' => 333, 'name' => 'Dra\'a', 'region_id' => 6],
            ['id' => 334, 'name' => 'El Ksiba', 'region_id' => 5],
            ['id' => 335, 'name' => 'Foum Jamaa', 'region_id' => 5],
            ['id' => 336, 'name' => 'Fquih Ben Salah', 'region_id' => 5],
            ['id' => 337, 'name' => 'Kasba Tadla', 'region_id' => 5],
            ['id' => 338, 'name' => 'Ouaouizeght', 'region_id' => 5],
            ['id' => 339, 'name' => 'Oulad Ayad', 'region_id' => 5],
            ['id' => 340, 'name' => 'Oulad M\'Barek', 'region_id' => 5],
            ['id' => 341, 'name' => 'Oulad Yaich', 'region_id' => 5],
            ['id' => 342, 'name' => 'Sidi Jaber', 'region_id' => 5],
            ['id' => 343, 'name' => 'Souk Sebt Oulad Nemma', 'region_id' => 5],
            ['id' => 344, 'name' => 'Zaouïat Cheikh', 'region_id' => 5],
            ['id' => 345, 'name' => 'Tanger', 'region_id' => 1],
            ['id' => 346, 'name' => 'Tétouan', 'region_id' => 1],
            ['id' => 347, 'name' => 'Akchour', 'region_id' => 1],
            ['id' => 348, 'name' => 'Assilah', 'region_id' => 1],
            ['id' => 349, 'name' => 'Bab Berred', 'region_id' => 1],
            ['id' => 350, 'name' => 'Bab Taza', 'region_id' => 1],
            ['id' => 351, 'name' => 'Brikcha', 'region_id' => 1],
            ['id' => 352, 'name' => 'Chefchaouen', 'region_id' => 1],
            ['id' => 353, 'name' => 'Dar Bni Karrich', 'region_id' => 1],
            ['id' => 354, 'name' => 'Dar Chaoui', 'region_id' => 1],
            ['id' => 355, 'name' => 'Fnideq', 'region_id' => 1],
            ['id' => 356, 'name' => 'Gueznaia', 'region_id' => 1],
            ['id' => 357, 'name' => 'Jebha', 'region_id' => 1],
            ['id' => 358, 'name' => 'Karia', 'region_id' => 3],
            ['id' => 359, 'name' => 'Khémis Sahel', 'region_id' => 1],
            ['id' => 360, 'name' => 'Ksar El Kébir', 'region_id' => 1],
            ['id' => 361, 'name' => 'Larache', 'region_id' => 1],
            ['id' => 362, 'name' => 'M\'diq', 'region_id' => 1],
            ['id' => 363, 'name' => 'Martil', 'region_id' => 1],
            ['id' => 364, 'name' => 'Moqrisset', 'region_id' => 1],
            ['id' => 365, 'name' => 'Oued Laou', 'region_id' => 1],
            ['id' => 366, 'name' => 'Oued Rmel', 'region_id' => 1],
            ['id' => 367, 'name' => 'Ouazzane', 'region_id' => 1],
            ['id' => 368, 'name' => 'Point Cires', 'region_id' => 1],
            ['id' => 369, 'name' => 'Sidi Lyamani', 'region_id' => 1],
            ['id' => 370, 'name' => 'Sidi Mohamed ben Abdallah el-Raisuni', 'region_id' => 1],
            ['id' => 371, 'name' => 'Zinat', 'region_id' => 1],
            ['id' => 372, 'name' => 'Ajdir', 'region_id' => 1],
            ['id' => 373, 'name' => 'Aknoul', 'region_id' => 3],
            ['id' => 374, 'name' => 'Al Hoceïma', 'region_id' => 1],
            ['id' => 375, 'name' => 'Aït Hichem', 'region_id' => 1],
            ['id' => 376, 'name' => 'Bni Bouayach', 'region_id' => 1],
            ['id' => 377, 'name' => 'Bni Hadifa', 'region_id' => 1],
            ['id' => 378, 'name' => 'Ghafsai', 'region_id' => 3],
            ['id' => 379, 'name' => 'Guercif', 'region_id' => 2],
            ['id' => 380, 'name' => 'Imzouren', 'region_id' => 1],
            ['id' => 381, 'name' => 'Inahnahen', 'region_id' => 1],
            ['id' => 382, 'name' => 'Issaguen', 'region_id' => 1],
            ['id' => 383, 'name' => 'Karia', 'region_id' => 6],
            ['id' => 384, 'name' => 'Karia Ba Mohamed', 'region_id' => 3],
            ['id' => 385, 'name' => 'Oued Amlil', 'region_id' => 3],
            ['id' => 386, 'name' => 'Oulad Zbair', 'region_id' => 3],
            ['id' => 387, 'name' => 'Tahla', 'region_id' => 3],
            ['id' => 388, 'name' => 'Tala Tazegwaght', 'region_id' => 1],
            ['id' => 389, 'name' => 'Tamassint', 'region_id' => 1],
            ['id' => 390, 'name' => 'Taounate', 'region_id' => 3],
            ['id' => 391, 'name' => 'Targuist', 'region_id' => 1],
            ['id' => 392, 'name' => 'Taza', 'region_id' => 3],
            ['id' => 393, 'name' => 'Taïnaste', 'region_id' => 3],
            ['id' => 394, 'name' => 'Thar Es-Souk', 'region_id' => 3],
            ['id' => 395, 'name' => 'Tissa', 'region_id' => 3],
            ['id' => 396, 'name' => 'Tizi Ouasli', 'region_id' => 3],
            ['id' => 397, 'name' => 'Laayoune', 'region_id' => 1],
            ['id' => 398, 'name' => 'El Marsa', 'region_id' => 1],
            ['id' => 399, 'name' => 'Tarfaya', 'region_id' => 1],
            ['id' => 400, 'name' => 'Boujdour', 'region_id' => 1],
            ['id' => 401, 'name' => 'Awsard', 'region_id' => 1],
            ['id' => 402, 'name' => 'Oued-Eddahab', 'region_id' => 1],
            ['id' => 403, 'name' => 'Stehat', 'region_id' => 1],
            ['id' => 404, 'name' => 'Aït Attab', 'region_id' => 5]
        ]);
        $this->command->info('cities added successfully');
    }
}
