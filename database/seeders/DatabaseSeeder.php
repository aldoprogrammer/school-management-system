<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Hash::make('password');

        $admins = [
            ['name' => 'Ravi', 'last_name' => 'Sharma', 'email' => 'admin1@demo.test'],
            ['name' => 'Ananya', 'last_name' => 'Iyer', 'email' => 'admin2@demo.test'],
            ['name' => 'Vikram', 'last_name' => 'Mehta', 'email' => 'admin3@demo.test'],
            ['name' => 'Priya', 'last_name' => 'Nair', 'email' => 'admin4@demo.test'],
            ['name' => 'Arjun', 'last_name' => 'Reddy', 'email' => 'admin5@demo.test'],
        ];

        $adminUsers = [];
        foreach ($admins as $data) {
            $user = new User();
            $user->name = $data['name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = $password;
            $user->user_type = 1;
            $user->status = 0;
            $user->is_delete = 0;
            $user->save();
            $adminUsers[] = $user;
        }

        $teachers = [
            ['name' => 'Sanjay', 'last_name' => 'Kulkarni', 'email' => 'teacher1@demo.test'],
            ['name' => 'Meera', 'last_name' => 'Joshi', 'email' => 'teacher2@demo.test'],
            ['name' => 'Nikhil', 'last_name' => 'Gupta', 'email' => 'teacher3@demo.test'],
            ['name' => 'Divya', 'last_name' => 'Menon', 'email' => 'teacher4@demo.test'],
            ['name' => 'Rahul', 'last_name' => 'Bose', 'email' => 'teacher5@demo.test'],
        ];

        foreach ($teachers as $data) {
            $user = new User();
            $user->name = $data['name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->password = $password;
            $user->user_type = 2;
            $user->status = 0;
            $user->is_delete = 0;
            $user->save();
        }

        $parents = [
            ['name' => 'Amit', 'last_name' => 'Patel', 'gender' => 'male', 'mobile_number' => '9810011001', 'address' => 'MG Road, Bengaluru', 'occupation' => 'Engineer', 'email' => 'parent1@demo.test'],
            ['name' => 'Sneha', 'last_name' => 'Rao', 'gender' => 'female', 'mobile_number' => '9810011002', 'address' => 'Link Road, Mumbai', 'occupation' => 'Accountant', 'email' => 'parent2@demo.test'],
            ['name' => 'Karthik', 'last_name' => 'Shetty', 'gender' => 'male', 'mobile_number' => '9810011003', 'address' => 'Park Street, Kolkata', 'occupation' => 'Business', 'email' => 'parent3@demo.test'],
            ['name' => 'Pooja', 'last_name' => 'Singh', 'gender' => 'female', 'mobile_number' => '9810011004', 'address' => 'Civil Lines, Jaipur', 'occupation' => 'Teacher', 'email' => 'parent4@demo.test'],
            ['name' => 'Manoj', 'last_name' => 'Verma', 'gender' => 'male', 'mobile_number' => '9810011005', 'address' => 'Anna Nagar, Chennai', 'occupation' => 'Doctor', 'email' => 'parent5@demo.test'],
        ];

        $parentUsers = [];
        foreach ($parents as $data) {
            $user = new User();
            $user->name = $data['name'];
            $user->last_name = $data['last_name'];
            $user->gender = $data['gender'];
            $user->mobile_number = $data['mobile_number'];
            $user->address = $data['address'];
            $user->occupation = $data['occupation'];
            $user->email = $data['email'];
            $user->password = $password;
            $user->user_type = 4;
            $user->status = 0;
            $user->is_delete = 0;
            $user->save();
            $parentUsers[] = $user;
        }

        $classes = [
            'Class 1 - A',
            'Class 1 - B',
            'Class 2 - A',
            'Class 2 - B',
            'Class 3 - A',
        ];

        $classModels = [];
        foreach ($classes as $index => $name) {
            $class = new ClassModel();
            $class->name = $name;
            $class->status = 0;
            $class->is_delete = 0;
            $class->created_by = $adminUsers[$index % count($adminUsers)]->id;
            $class->save();
            $classModels[] = $class;
        }

        $subjects = [
            ['name' => 'Mathematics', 'type' => 'Theory'],
            ['name' => 'English', 'type' => 'Theory'],
            ['name' => 'Science', 'type' => 'Theory'],
            ['name' => 'Computer Lab', 'type' => 'Practice'],
            ['name' => 'Hindi', 'type' => 'Theory'],
        ];

        $subjectModels = [];
        foreach ($subjects as $index => $data) {
            $subject = new SubjectModel();
            $subject->name = $data['name'];
            $subject->type = $data['type'];
            $subject->status = 0;
            $subject->is_delete = 0;
            $subject->created_by = $adminUsers[$index % count($adminUsers)]->id;
            $subject->save();
            $subjectModels[] = $subject;
        }

        $students = [
            [
                'name' => 'Aarav',
                'last_name' => 'Kumar',
                'admission_number' => 'ADM-001',
                'roll_number' => 'ROLL-001',
                'gender' => 'male',
                'date_of_birth' => '2011-04-12',
                'class_index' => 0,
                'parent_index' => 0,
                'caste' => 'Brahmin',
                'religion' => 'Hindu',
                'mobile_number' => '9810012001',
                'admission_date' => '2024-01-10',
                'email' => 'student1@demo.test',
            ],
            [
                'name' => 'Diya',
                'last_name' => 'Shah',
                'admission_number' => 'ADM-002',
                'roll_number' => 'ROLL-002',
                'gender' => 'female',
                'date_of_birth' => '2011-07-30',
                'class_index' => 1,
                'parent_index' => 1,
                'caste' => 'Kshatriya',
                'religion' => 'Hindu',
                'mobile_number' => '9810012002',
                'admission_date' => '2024-01-10',
                'email' => 'student2@demo.test',
            ],
            [
                'name' => 'Ishaan',
                'last_name' => 'Rao',
                'admission_number' => 'ADM-003',
                'roll_number' => 'ROLL-003',
                'gender' => 'male',
                'date_of_birth' => '2012-02-18',
                'class_index' => 2,
                'parent_index' => 2,
                'caste' => 'Vaishya',
                'religion' => 'Hindu',
                'mobile_number' => '9810012003',
                'admission_date' => '2024-01-10',
                'email' => 'student3@demo.test',
            ],
            [
                'name' => 'Kavya',
                'last_name' => 'Nair',
                'admission_number' => 'ADM-004',
                'roll_number' => 'ROLL-004',
                'gender' => 'female',
                'date_of_birth' => '2012-09-05',
                'class_index' => 3,
                'parent_index' => 3,
                'caste' => 'Brahmin',
                'religion' => 'Hindu',
                'mobile_number' => '9810012004',
                'admission_date' => '2024-01-10',
                'email' => 'student4@demo.test',
            ],
            [
                'name' => 'Rohan',
                'last_name' => 'Das',
                'admission_number' => 'ADM-005',
                'roll_number' => 'ROLL-005',
                'gender' => 'male',
                'date_of_birth' => '2013-01-22',
                'class_index' => 4,
                'parent_index' => 4,
                'caste' => 'Kshatriya',
                'religion' => 'Hindu',
                'mobile_number' => '9810012005',
                'admission_date' => '2024-01-10',
                'email' => 'student5@demo.test',
            ],
        ];

        foreach ($students as $data) {
            $student = new User();
            $student->name = $data['name'];
            $student->last_name = $data['last_name'];
            $student->admission_number = $data['admission_number'];
            $student->roll_number = $data['roll_number'];
            $student->gender = $data['gender'];
            $student->date_of_birth = $data['date_of_birth'];
            $student->class_id = $classModels[$data['class_index']]->id;
            $student->parent_id = $parentUsers[$data['parent_index']]->id;
            $student->caste = $data['caste'];
            $student->religion = $data['religion'];
            $student->mobile_number = $data['mobile_number'];
            $student->admission_date = $data['admission_date'];
            $student->email = $data['email'];
            $student->password = $password;
            $student->user_type = 3;
            $student->status = 0;
            $student->is_delete = 0;
            $student->save();
        }

        foreach ($classModels as $classIndex => $class) {
            foreach ($subjectModels as $subjectIndex => $subject) {
                if ((($classIndex + $subjectIndex) % 2) === 0) {
                    $assign = new ClassSubjectModel();
                    $assign->class_id = $class->id;
                    $assign->subject_id = $subject->id;
                    $assign->status = 0;
                    $assign->is_delete = 0;
                    $assign->created_by = $adminUsers[$classIndex % count($adminUsers)]->id;
                    $assign->save();
                }
            }
        }
    }
}
