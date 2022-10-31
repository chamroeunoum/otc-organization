<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(PermissionUsersTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(CountesiesTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(MinistriesTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(DocumentFavoritesTableSeeder::class);
        $this->call(DocumentFoldersTableSeeder::class);
        $this->call(DocumentGroupsTableSeeder::class);
        $this->call(DocumentMinistriesTableSeeder::class);
        $this->call(DocumentRelatedMinistriesTableSeeder::class);
        $this->call(DocumentSignaturesTableSeeder::class);
        $this->call(DocumentUsersTableSeeder::class);
        $this->call(FoldersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(SignaturesTableSeeder::class);
        $this->call(MinistryPeopleTableSeeder::class);
        $this->call(OauthAccessTokensTableSeeder::class);
        $this->call(OauthAuthCodesTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(OauthPersonalAccessClientsTableSeeder::class);
        $this->call(OauthRefreshTokensTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ActivityLogTableSeeder::class);
        $this->call(DocumentViewLogsTableSeeder::class);
        $this->call(OfficerPositionsTableSeeder::class);
        $this->call(PeopleInDocumentsTableSeeder::class);
        $this->call(UnitTeamworkTypesTableSeeder::class);
        $this->call(UnitTeamworkRegulatorsTableSeeder::class);
        $this->call(OfficerRanksTableSeeder::class);
        $this->call(DocumentOwnMinistriesTableSeeder::class);
        $this->call(PopmessageTableSeeder::class);
    }
}
