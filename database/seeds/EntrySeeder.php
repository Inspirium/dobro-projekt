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
        	['name' => 'a', 'location' => rand(1,20), 'description' => 'qa', 'marker' => rand(1,6)],
        	['name' => 'q', 'location' => rand(1,20), 'description' => 'zx', 'marker' => rand(1,6)],
        	['name' => 'w', 'location' => rand(1,20), 'description' => 'wer', 'marker' => rand(1,6)],
        	['name' => 'e', 'location' => rand(1,20), 'description' => 'sdf', 'marker' => rand(1,6)],
        	['name' => 'r', 'location' => rand(1,20), 'description' => 'xcv', 'marker' => rand(1,6)],
        	['name' => 't', 'location' => rand(1,20), 'description' => 'ty', 'marker' => rand(1,6)],
        	['name' => 'y', 'location' => rand(1,20), 'description' => 'trg', 'marker' => rand(1,6)],
        	['name' => 'u', 'location' => rand(1,20), 'description' => 'cd', 'marker' => rand(1,6)],
        	['name' => 'i', 'location' => rand(1,20), 'description' => 'erf', 'marker' => rand(1,6)],
        	['name' => 'o', 'location' => rand(1,20), 'description' => 'hgn', 'marker' => rand(1,6)],
        	['name' => 'p', 'location' => rand(1,20), 'description' => 'ku', 'marker' => rand(1,6)],
        	['name' => 'a', 'location' => rand(1,20), 'description' => 'kgl', 'marker' => rand(1,6)],
        	['name' => 's', 'location' => rand(1,20), 'description' => 'mnv', 'marker' => rand(1,6)],
        	['name' => 'd', 'location' => rand(1,20), 'description' => 'qwe', 'marker' => rand(1,6)],
        	['name' => 'f', 'location' => rand(1,20), 'description' => 'gvfd', 'marker' => rand(1,6)],
        	['name' => 'g', 'location' => rand(1,20), 'description' => 'cds', 'marker' => rand(1,6)],
        	['name' => 'h', 'location' => rand(1,20), 'description' => 'tygf', 'marker' => rand(1,6)],
        	['name' => 'j', 'location' => rand(1,20), 'description' => 'ccv', 'marker' => rand(1,6)],
        	['name' => 'k', 'location' => rand(1,20), 'description' => 'dkdl', 'marker' => rand(1,6)],
        	['name' => 'l', 'location' => rand(1,20), 'description' => 'vncm', 'marker' => rand(1,6)],
        	['name' => 'z', 'location' => rand(1,20), 'description' => 'ert', 'marker' => rand(1,6)],
        	['name' => 'x', 'location' => rand(1,20), 'description' => 'xvc', 'marker' => rand(1,6)],
        	['name' => 'c', 'location' => rand(1,20), 'description' => 'rorp', 'marker' => rand(1,6)],
        	['name' => 'v', 'location' => rand(1,20), 'description' => 'mcnd', 'marker' => rand(1,6)],
        	['name' => 'b', 'location' => rand(1,20), 'description' => 'dfg', 'marker' => rand(1,6)],
        	['name' => 'n', 'location' => rand(1,20), 'description' => 'rty', 'marker' => rand(1,6)],
        	['name' => 'm', 'location' => rand(1,20), 'description' => 'dsa', 'marker' => rand(1,6)],
        	['name' => 'qw', 'location' => rand(1,20), 'description' => 'bvc', 'marker' => rand(1,6)],
        	['name' => 'er', 'location' => rand(1,20), 'description' => 'sdf', 'marker' => rand(1,6)],
        	['name' => 'ty', 'location' => rand(1,20), 'description' => 'yoy', 'marker' => rand(1,6)],
        	['name' => 'ui', 'location' => rand(1,20), 'description' => 'dls', 'marker' => rand(1,6)],
        	['name' => 'op', 'location' => rand(1,20), 'description' => 'vmk', 'marker' => rand(1,6)],
        	['name' => 'as', 'location' => rand(1,20), 'description' => 'cdma', 'marker' => rand(1,6)],
        	['name' => 'df', 'location' => rand(1,20), 'description' => 'dacd', 'marker' => rand(1,6)],
        	['name' => 'fg', 'location' => rand(1,20), 'description' => 'amd', 'marker' => rand(1,6)],
        	['name' => 'hj', 'location' => rand(1,20), 'description' => 'iod', 'marker' => rand(1,6)],
        	['name' => 'kl', 'location' => rand(1,20), 'description' => 'cdv', 'marker' => rand(1,6)],
        	['name' => 'zx', 'location' => rand(1,20), 'description' => 'cdz', 'marker' => rand(1,6)],
        	['name' => 'cv', 'location' => rand(1,20), 'description' => 'crmk', 'marker' => rand(1,6)],
        	['name' => 'vb', 'location' => rand(1,20), 'description' => 'amdk', 'marker' => rand(1,6)],
        	['name' => 'bn', 'location' => rand(1,20), 'description' => 'croo', 'marker' => rand(1,6)],
        	['name' => 'nm', 'location' => rand(1,20), 'description' => 'cmvn', 'marker' => rand(1,6)],
        	['name' => 'asd', 'location' => rand(1,20), 'description' => 'damcdk', 'marker' => rand(1,6)],
        	['name' => 'qwe', 'location' => rand(1,20), 'description' => 'tovo', 'marker' => rand(1,6)],
        	['name' => 'rty', 'location' => rand(1,20), 'description' => 'ama', 'marker' => rand(1,6)],
        	['name' => 'uio', 'location' => rand(1,20), 'description' => 'gtko', 'marker' => rand(1,6)],
        	['name' => 'fgh', 'location' => rand(1,20), 'description' => 'cx', 'marker' => rand(1,6)],
        	['name' => 'jkl', 'location' => rand(1,20), 'description' => 'crg', 'marker' => rand(1,6)],
        	['name' => 'zxc', 'location' => rand(1,20), 'description' => 'zxc', 'marker' => rand(1,6)],
        	['name' => 'vbn', 'location' => rand(1,20), 'description' => 'dmdk', 'marker' => rand(1,6)],
        	['name' => 'bnm', 'location' => rand(1,20), 'description' => 'cds', 'marker' => rand(1,6)],
        ]);
    }
}
