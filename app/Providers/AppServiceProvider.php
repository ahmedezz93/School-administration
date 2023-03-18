<?php

namespace App\Providers;

use App\interface\attendancerepositoryinterface;
use App\interface\classroomrepositoryinterface;
use App\interface\dashboardteacherpositoryinterface;
use App\interface\examrepositoryinterface;
use App\interface\feerepositoryinterface;
use App\interface\gradesrepositoryinterface;
use App\interface\libraryrepositoryinterface;
use App\interface\onlineclassesrepositoryinterface;
use App\interface\paymentrepositoryinterface;
use App\interface\promotionrepositoryinterface;
use App\interface\questionrepositoryinterface;
use App\interface\sectionrepositoryinterface;
use App\interface\settingrepositoryinterface;
use App\interface\student_feesrepositoryinterface;
use App\interface\students_accountsrepositoryinterface;
use App\interface\studentsrepositoryinterface;
use App\interface\subjectrepositoryinterface;
use App\interface\teacherexamrepositoryinterface;
use App\interface\teacherrepositoryinterface;
use App\Repository\attendancerepository;
use App\Repository\classroomrepository;
use App\Repository\dashboardteacherpository;
use App\Repository\examrepository;
use App\Repository\feerepository;
use App\Repository\gradesrepository;
use App\Repository\libraryrepository;
use App\Repository\onlineclassesrepository;
use App\Repository\paymentrepository;
use App\Repository\promotionrepository;
use App\Repository\questionrepository;
use App\Repository\sectionrepository;
use App\Repository\settingrepository;
use App\Repository\students_accountsrepository;
use App\Repository\students_feesrepository;
use App\Repository\studentsrepository;
use App\Repository\subjectrepository;
use App\Repository\teacherexamrepository;
use App\Repository\teacherrepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(

      gradesrepositoryinterface::class,
      gradesrepository::class,

       );

       $this->app->bind(

        classroomrepositoryinterface::class,
        classroomrepository::class,

         );

         $this->app->bind(

            sectionrepositoryinterface::class,
            sectionrepository::class,

             );

             $this->app->bind(

                teacherrepositoryinterface::class,
                teacherrepository::class,

                 );

                 $this->app->bind(

                    studentsrepositoryinterface::class,
                    studentsrepository::class,

                     );

                     $this->app->bind(

                        feerepositoryinterface::class,
                        feerepository::class,

                         );

                         $this->app->bind(

                            student_feesrepositoryinterface::class,
                            students_feesrepository::class,

                             );

                             $this->app->bind(

                                paymentrepositoryinterface::class,
                                paymentrepository::class,

                                 );


                                 $this->app->bind(

                                    students_accountsrepositoryinterface::class,
                                    students_accountsrepository::class,

                                     );

                                     $this->app->bind(

                                        promotionrepositoryinterface::class,
                                        promotionrepository::class,

                                         );

                                         $this->app->bind(

                                            attendancerepositoryinterface::class,
                                            attendancerepository::class,

                                             );
                                             $this->app->bind(

                                                subjectrepositoryinterface::class,
                                                subjectrepository::class,

                                                 );
                                                 $this->app->bind(

                                                    examrepositoryinterface::class,
                                                    examrepository::class,

                                                     );


                                                     $this->app->bind(

                                                        onlineclassesrepositoryinterface::class,
                                                        onlineclassesrepository::class,

                                                         );

                                                         $this->app->bind(

                                                            libraryrepositoryinterface::class,
                                                            libraryrepository::class,

                                                             );

                                                             $this->app->bind(

                                                                settingrepositoryinterface::class,
                                                                settingrepository::class,

                                                                 );


                                                                 $this->app->bind(

                                                                    dashboardteacherpositoryinterface::class,
                                                                    dashboardteacherpository::class,

                                                                     );

                                                                     $this->app->bind(

                                                                        teacherexamrepositoryinterface::class,
                                                                        teacherexamrepository::class,

                                                                         );

                                                                         $this->app->bind(

                                                                            questionrepositoryinterface::class,
                                                                            questionrepository::class,

                                                                             );




    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
