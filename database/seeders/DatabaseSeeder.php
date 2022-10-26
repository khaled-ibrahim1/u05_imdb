<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Category::truncate();
        Movie::where('id', '>', 0)->delete();

        User::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@admin.se',
            'password' => 'admin123',
            'is_admin' => '1'
        ]);

        User::create([
            'username' => 'user',
            'name' => 'user',
            'email' => 'user@user.se',
            'password' => 'user123',
            'is_admin' => '0'
        ]);

        User::create([
            'username' => 'chas',
            'name' => 'chas',
            'email' => 'chas@chas.se',
            'password' => 'chas123',
            'is_admin' => '1'
        ]);


        $action = Category::create([
            'name' => 'action',
            'slug' => 'action'
        ]);

        $drama = Category::create([
            'name' => 'drama',
            'slug' => 'drama'
        ]);

        $family = Category::create([
            'name' => 'family',
            'slug' => 'family'
        ]);

        $comedy = Category::create([
            'name' => 'comedy',
            'slug' => 'comedy'
        ]);

        Movie::create([
            'category_id' => $action->id,
            'slug' => 'terminator-2',
            'title' => 'Terminator 2',
            'year' => 1991,
            'body' => 'A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her ten-year-old son John from a more advanced and powerful cyborg.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BMGU2NzRmZjUtOGUxYS00ZjdjLWEwZWItY2NlM2JhNjkxNTFmXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/CRRlbK5w8AE',
        ]);

        Movie::create([
            'category_id' => $action->id,
            'slug' => 'the-dark-knight',
            'title' => 'The Dark Knight',
            'year' => 2008,
            'body' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/EXeTwQWrcwY',
        ]);


        Movie::create([
            'category_id' => $action->id,
            'slug' => 'black-adam',
            'title' => 'Black Adam',
            'year' => 2022,
            'body' => 'Nearly 5,000 years after he was bestowed with the almighty powers of the Egyptian gods-and imprisoned just as quickly-Black Adam is freed from his earthly tomb, ready to unleash his unique form of justice on the modern world.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BYzZkOGUwMzMtMTgyNS00YjFlLTg5NzYtZTE3Y2E5YTA5NWIyXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_UX67_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/X0tOpBuYasI',
        ]);

        Movie::create([
            'category_id' => $family->id,
            'slug' => 'toy-story',
            'title' => 'Toy Story',
            'year' => 1995,
            'body' => 'A cowboy doll is profoundly threatened and jealous when a new spaceman action figure supplants him as top toy in a boys bedroom.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BMDU2ZWJlMjktMTRhMy00ZTA5LWEzNDgtYmNmZTEwZTViZWJkXkEyXkFqcGdeQXVyNDQ2OTk4MzI@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/rNk1Wi8SvNc',
        ]);

        Movie::create([
            'category_id' => $family->id,
            'slug' => 'finding-nemo',
            'title' => 'Finding Nemo',
            'year' => 2003,
            'body' => 'After his son is captured in the Great Barrier Reef and taken to Sydney, a timid clownfish sets out on a journey to bring him home.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BZTAzNWZlNmUtZDEzYi00ZjA5LWIwYjEtZGM1NWE1MjE4YWRhXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/wZdpNglLbt8'
        ]);

        Movie::create([
            'category_id' => $family->id,
            'slug' => 'inside-out',
            'title' => 'Inside out',
            'year' => 2015,
            'body' => 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house, and school.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BOTgxMDQwMDk0OF5BMl5BanBnXkFtZTgwNjU5OTg2NDE@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/yRUAzGQ3nSY'
        ]);

        Movie::create([
            'category_id' => $family->id,
            'slug' => 'lion-king',
            'title' => 'Lion King',
            'year' => 1994,
            'body' => 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2JiM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/lFzVJEksoDY',
        ]);

        Movie::create([
            'category_id' => $comedy->id,
            'slug' => 'zoolander',
            'title' => 'Zoolander',
            'year' => 2001,
            'body' => 'At the end of his career, a clueless fashion model is brainwashed to kill the Prime Minister of Malaysia.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BODI4NDY2NDM5M15BMl5BanBnXkFtZTgwNzEwOTMxMDE@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/MaEeSJZYkpY'
        ]);

        Movie::create([
            'category_id' => $comedy->id,
            'slug' => 'the-mask',
            'title' => 'The Mask',
            'year' => 1994,
            'body' => 'Bank clerk Stanley Ipkiss is transformed into a manic superhero when he wears a mysterious mask.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BOWExYjI5MzktNTRhNi00Nzg2LThkZmQtYWVkYjRlYWI2MDQ4XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_UY209_CR0,0,140,209_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/LZl69yk5lEY'
        ]);

        Movie::create([
            'category_id' => $comedy->id,
            'slug' => 'amsterdam',
            'title' => 'Amsterdam',
            'year' => 2022,
            'body' => 'In the 1930s, three friends witness a murder, are framed for it, and uncover one of the most outrageous plots in American history.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BNDQwNzE0ZTItYmZjMC00NjI3LWFlNzctNTExZDY2NWE0Zjc0XkEyXkFqcGdeQXVyMTA3MDk2NDg2._V1_UX67_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/GLs2xxM0e78'
        ]);
        Movie::create([
            'category_id' => $comedy->id,
            'slug' => 'bullet-train',
            'title' => 'Bullet Train',
            'year' => 2022,
            'body' => 'Five assassins aboard a swiftly-moving bullet train find out that their missions have something in common.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BMDU2ZmM2OTYtNzIxYy00NjM5LTliNGQtN2JmOWQzYTBmZWUzXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_UX67_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0IOsk2Vlc4o"'
        ]);
        Movie::create([
            'category_id' => $drama->id,
            'slug' => 'top-gun-maverick',
            'title' => 'Top Gun: Maverick',
            'year' => 2022,
            'body' => 'After thirty years, Maverick is still pushing the envelope as a top naval aviator, but must confront ghosts of his past when he leads TOP GUNs elite graduates on a mission that demands the ultimate sacrifice from those chosen to fly it.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BZWYzOGEwNTgtNWU3NS00ZTQ0LWJkODUtMmVhMjIwMjA1ZmQwXkEyXkFqcGdeQXVyMjkwOTAyMDU@._V1_UX67_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/giXco2jaZ_4'
        ]);

        Movie::create([
            'category_id' => $drama->id,
            'slug' => 'joker',
            'title' => 'Joker',
            'year' => 2019,
            'body' => 'A mentally troubled stand-up comedian embarks on a downward spiral that leads to the creation of an iconic villain.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BNGVjNWI4ZGUtNzE0MS00YTJmLWE0ZDctN2ZiYTk2YmI3NTYyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_UX67_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/zAGVQLHvwOY',
        ]);

        Movie::create([
            'category_id' => $drama->id,
            'slug' => 'django-unchained',
            'title' => 'Django Unchained',
            'year' => 2012,
            'body' => 'With the help of a German bounty-hunter, a freed slave sets out to rescue his wife from a brutal plantation-owner in Mississippi.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BMjIyNTQ5NjQ1OV5BMl5BanBnXkFtZTcwODg1MDU4OA@@._V1_UX67_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/0fUCuvNlOCg'
        ]);

        Movie::create([
            'category_id' => $drama->id,
            'slug' => 'forrest-gump',
            'title' => 'Forrest Gump',
            'year' => 1994,
            'body' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.',
            'photo_poster' => 'https://m.media-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UY98_CR0,0,67,98_AL_.jpg',
            'trailer_url' => 'https://www.youtube.com/embed/bLvqoHBptjg'
        ]);
    }
}