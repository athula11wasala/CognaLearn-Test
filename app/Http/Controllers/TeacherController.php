<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Exception;
use App\Services\CommonService;

class TeacherController extends Controller
{
    private $cmsService;

    public function __construct(CommonService $commonService)
    {
        $this->cmsService = $commonService;
    }

    /**
     * Get all teachers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->cmsService->listTeacher();
            if ($data) {
                return response()->json(["data" => $data], 201);
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
     * Create a  teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TeacherRequest $request)
    { 
        try {
            $data = $this->cmsService->createTeacher($request->all());
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
     * Display Teacher.
     *
     * @bodyParam teacherId integer required
     * @return \Illuminate\Http\Response
     */
    public function show($teacherId = null)
    {
        try {
            $data = $this->cmsService->getTeacher($teacherId);
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
     * Update teacher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam teacherId integer required
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teacherId)
    {
       
        try {
            $data = $this->cmsService->updateTeacher(
                $teacherId,
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
     * delete teacher
     *
     * @bodyParam teacherId integer required
     * @return \Illuminate\Http\Response
     */
    public function destroy($teacherId)
    {
        try {
            $data = $this->cmsService->deleteTeacher($teacherId);
          
            if ($data['flag'] == true) {
                return response()->json(
                    ["sucess" => "successfully deleted"],
                    200
                );
            }

            return response()->json(
                ["error" =>$data['message']],
                400
            );
        } catch (Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
    }
}
