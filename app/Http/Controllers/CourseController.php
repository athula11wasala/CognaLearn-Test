<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Exception;
use App\Services\CommonService;

class CourseController extends Controller
{
    private $cmsService;

    public function __construct(CommonService $commonService)
    {
        $this->cmsService = $commonService;
    }

    /**
     * Get all courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->cmsService->listCourses();
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
     * Create a Course.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CourseRequest $request)
    {
        try {
            $data = $this->cmsService->createCourse($request->all());
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
     * Display Course.
     *
     * @bodyParam courseId integer required
     * @return \Illuminate\Http\Response
     */
    public function show($courseId = null)
    {
        try {
            $data = $this->cmsService->getCourse($courseId);
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
     * Update course.
     *
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam courserId integer required
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerId)
    {
        try {
            $data = $this->cmsService->updateCourse(
                $customerId,
                $request->all()
            );
            if ($data) {
                return response()->json(
                    ["sucess" => "successfully updated"],
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
     * delete course
     *
     * @bodyParam courseId integer required
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        try {
            $data = $this->cmsService->deleteCourse($courseId);
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
