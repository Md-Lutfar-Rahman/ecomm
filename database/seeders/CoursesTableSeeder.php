<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Course 1',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 2',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 3',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 4',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 5',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 6',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 7',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 8',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            [
                'name' => 'Course 9',
                'description' => 'Description for Course 1',
                'price' => 99.99,
                'duration' => 60,
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'image' => 'course1.jpg',
                'intro_video' => 'intro1.mp4',
            ],
            // Add more courses here...
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
