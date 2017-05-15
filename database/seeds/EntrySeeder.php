<?php

use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entries')->insert([
        	['name' => 'Ivan', 'location' => rand(1,20), 'description' => 'Morske orgulje Zadar', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Marko', 'location' => rand(1,20), 'description' => 'Arena Pula', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Sanja', 'location' => rand(1,20), 'description' => 'Crkva Sv. Donata u Zadru', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Ivana', 'location' => rand(1,20), 'description' => 'Dubrovačke gradske zidine', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Mirela', 'location' => rand(1,20), 'description' => 'Katedrala Sv. Jakova Šibenik', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Kaja', 'location' => rand(1,20), 'description' => 'Hum, najmanji grad na svijetu', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Ankica', 'location' => rand(1,20), 'description' => 'Dioklecijanova palača', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Ante', 'location' => rand(1,20), 'description' => 'Plitvička jezera', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Manuel', 'location' => rand(1,20), 'description' => 'Zlatni rat na Bolu', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Tomislav', 'location' => rand(1,20), 'description' => 'Kravata', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Preo', 'location' => rand(1,20), 'description' => 'Ivan Vučetić, hrvatski izumitelj daktiloskopije', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Milan', 'location' => rand(1,20), 'description' => 'Faust Vrančić, jezikoslovac, inženjer, svećenik, izumitelj padobrana', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Ivana', 'location' => rand(1,20), 'description' => 'Eduard Slavoljub Penkala, izumitelj tehničke olovke, nalivpera, termos boce, deterdženta za pranje rublja', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Slavko', 'location' => rand(1,20), 'description' => 'Marin Soljačić, profesor na MIT-u, jedan od izumitelja bežičnog nezračećeg prijenosa energije', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Vedran', 'location' => rand(1,20), 'description' => 'Ivan Vukić, izumitelj torpeda', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Miha', 'location' => rand(1,20), 'description' => 'Dražen Petrović', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Leo', 'location' => rand(1,20), 'description' => 'Janica Kostelić', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Stjepan', 'location' => rand(1,20), 'description' => 'Luka Modrić', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Marinko', 'location' => rand(1,20), 'description' => 'Goran Ivanišević', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Marina', 'location' => rand(1,20), 'description' => 'licitarsko srce', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Vedran', 'location' => rand(1,20), 'description' => 'paška čipka', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Slavko', 'location' => rand(1,20), 'description' => 'Sinjska alka', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Goran', 'location' => rand(1,20), 'description' => 'Lado', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Gordana', 'location' => rand(1,20), 'description' => 'Riječki karneval', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Maja', 'location' => rand(1,20), 'description' => 'Fakultet elektronike i računarstva', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Đuro', 'location' => rand(1,20), 'description' => 'STEMI, robot sa šest nogu kojim se upravlja pomoću pametnog telefona djelo je mladog tima od četvorice FER-ovaca', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Slavko', 'location' => rand(1,20), 'description' => 'Institut za razvoj i inovativnost mladih, njihovi programi obuhvaćaju više od 360 škola u zemlji i 45 tisuća učenika kojima su podijelili robote i setove za programiranje', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Vedran', 'location' => rand(1,20), 'description' => 'Include, startup mladog studenta splitskog FESB-a, koji je izrastao na njegovim pametnim klupama, koje se solarno pune, a mogu napajati javnu rasvjetu i mobitele', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Filip', 'location' => rand(1,20), 'description' => 'MAKERBuino, retro igrača konzola karlovačkog maturanta koji je na Kickstarteru umjesto planiranih deset skupio preko sto tisuća dolara', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Emina', 'location' => rand(1,20), 'description' => 'Farmeron, hrvatski cloud sustav koji pomoću algoritama nadzire farme krava muzara', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Vedrana', 'location' => rand(1,20), 'description' => 'Concept One, jedan od najbržih električnih automobila na svijetu, proizveden u Rimac Automobili koji zapošljavaju 250 ljudi', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Ivan', 'location' => rand(1,20), 'description' => 'E-glas, riječka tvrtka koja proizvodi sustave koji invalidima omogućavaju da pomoću glasa kontroliraju svojim domovima', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Tomislav', 'location' => rand(1,20), 'description' => 'Slice of Life, kratki hrvatski SF film, projekt koji nastaje u garaži trojice filmskih fanatika', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Edvard', 'location' => rand(1,20), 'description' => 'Zavod za automatiku i računalno inženjerstvo FER-a, tu nastaju neki od najinovativnijih tech projekata u zemlji i tiču se dronova, robota i ronilica', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Antonio', 'location' => rand(1,20), 'description' => 'Hrana', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Marko', 'location' => rand(1,20), 'description' => 'Jadransko more', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Mihovil', 'location' => rand(1,20), 'description' => 'Mladi hrvatski inovatori', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Matilda', 'location' => rand(1,20), 'description' => 'Donatori krvi', 'marker' => rand(1,6), 'approved' => 1],
        	['name' => 'Lovorka', 'location' => rand(1,20), 'description' => 'Pametni ležeći policajci koje su smislili maturanti Gimnazije Metković Božo Jovanović Bartulović, Ivan Pavlović i Frano Rajič', 'marker' => rand(1,6), 'approved' => 1],

        ]);
    }
}
