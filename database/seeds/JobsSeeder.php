<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Job;

class JobsSeeder extends Seeder {

    public function run()
    {
        DB::table('jobs')->delete();

        Job::insert([
            [
                'id' => 3,
                'company_id' => 15,
                'job_name' => "Product Lead",
                'url' => "http://blog.differential.com/differential-job-posting-product-lead/",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ],
            [
                'id' => 5,
                'company_id' => 2,
                'job_name' => "Full Stack Developer",
                'url' => "http://cintrifusejobs.force.com/careers/ts2__JobDetails?jobId=a0KF0000007yK8bMAE&tSource=",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ],
            [
                'id' => 6,
                'company_id' => 2,
                'job_name' => "Development Lead ",
                'url' => "http://cintrifusejobs.force.com/careers/ts2__JobDetails?jobId=a0KF0000007yK8qMAE&tSource=",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ],
            [
                'id' => 7,
                'company_id' => 2,
                'job_name' => "DevOps Lead",
                'url' => "http://cintrifusejobs.force.com/careers/ts2__JobDetails?jobId=a0KF0000007yK8lMAE&tSource=",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ],
            [
                'id' => 8,
                'company_id' => 2,
                'job_name' => "Data Store Lead",
                'url' => "http://cintrifusejobs.force.com/careers/ts2__JobDetails?jobId=a0KF0000007yK90MAE&tSource=",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ],
            [
                'id' => 9,
                'company_id' => 2,
                'job_name' => "Front End Developer",
                'url' => "http://cintrifusejobs.force.com/careers/ts2__JobDetails?jobId=a0KF0000008EJM3MAO&tSource=",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ],
            [
                'id' => 10,
                'company_id' => 2,
                'job_name' => "Front-End Developer",
                'url' => "http://cintrifusejobs.force.com/careers/ts2__JobDetails?jobId=a0KF0000008EADyMAO&tSource=",
                'created_at' => "0000-00-00 00:00:00",
                'updated_at' => "0000-00-00 00:00:00"
            ]
        ]);
    }

}