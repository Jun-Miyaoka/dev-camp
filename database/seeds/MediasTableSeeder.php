<?php
use Illuminate\Database\Seeder;

/**
 * Class MediasTableSeeder
 */
class MediasTableSeeder extends Seeder
{
    /**
     * プロダクト追加
     * @param int $id
     * @param string $name
     */
    protected function createMedia(int $id, string $name)
    {
        if (!App\Media::where('id', $id)->exists()) {
            factory(App\Media::class)->create(['id' => $id, 'media_name' => $name]);
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMedia(1, 'Movie');
        $this->createMedia(2, 'Music');
        $this->createMedia(3, 'ONA');
        $this->createMedia(4, 'OVA');
        $this->createMedia(5, 'Special');
        $this->createMedia(6, 'TV');
    }
}
