<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CourseTeacherRequest;
use Exception;
use App\Services\CommonService;

class TeacherCourseController extends Controller
{
    private $cmsService;

    public function __construct(CommonService $commonService)
    {
        $this->cmsService = $commonService;
    }

    /**
     * Get all teacger' assign course Info.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try {
            $data = $this->cmsService->listTeacherCourse();
            if ($data) {
                return response()->json(["data" => $data], 200);
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * Assign   teacher to course.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CourseTeacherRequest $request)
    { 
        try {
            $data = $this->cmsService->assignTeacherCourse($request->all());
            if ($data) {
                return response()->json(
                    ["sucess" => "successfully added"],
                    200
                );
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * Display TeacherCourse Info.
     *
     * @bodyParam teacher_course_Id integer required
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        try {
            $data = $this->cmsService->getTeacherCourse($id);
            if ($data) {
                return response()->json(["data" => $data], 200);
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }

    /**
     * delete assing course
     *
     * @bodyParam Id integer required
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->cmsService->deleteAssignCourse($id);
            if ($data) {
                return response()->json(
                    ["sucess" => "successfully deleted"],
                    200
                );
            }

            return response()->json(
                ["error" => __("messages.un_processable_request")],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }


}
