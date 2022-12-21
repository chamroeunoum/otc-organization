<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UsersTableSeeder::class);
        $this->call(CountesiesTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(MinistriesTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(DocumentGroupsTableSeeder::class);
        $this->call(DocumentMinistriesTableSeeder::class);
        $this->call(DocumentRelatedMinistriesTableSeeder::class);
        $this->call(DocumentSignaturesTableSeeder::class);
        $this->call(DocumentUsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(SignaturesTableSeeder::class);
        $this->call(MinistryPeopleTableSeeder::class);
        $this->call(PeopleInDocumentsTableSeeder::class);
        $this->call(UnitTeamworkTypesTableSeeder::class);
        $this->call(UnitTeamworkRegulatorsTableSeeder::class);
        $this->call(OfficerRanksTableSeeder::class);
        $this->call(DocumentOwnMinistriesTableSeeder::class);
        $this->call(PopmessageTableSeeder::class);
        $this->call(YpCategoriesTableSeeder::class);
        $this->call(YpProductsTableSeeder::class);
    }
}
