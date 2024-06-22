<?php

namespace App\Http\Controllers\API;

use App\Helpers\RestPagination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentee;
use Illuminate\Support\Facades\Validator;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Validate pagination parameters
        $this->validatePagination($request);

        // Build query to retrieve Mentee records
        $query = Mentee::query()->orderBy('created_at', 'desc');

        // Keyword search
        $keyword = $request->get('keyword');
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('IDNguoiDung', 'like', "%{$keyword}%")
                    ->orWhere('IDMentor', 'like', "%{$keyword}%")
                    ->orWhere('DiemGPA', 'like', "%{$keyword}%")
                    ->orWhere('NoiDung', 'like', "%{$keyword}%");
            });
        }

        // Paginate the query and return results as JSON
        return RestPagination::parse(
            $query->paginate(
                $request->get('limit', 10),
                ['*'],
                'page',
                $request->get('page', 1)
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Mentee
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $this->validateIncomingRequest($request, [
            'IDNguoiDung' => 'required|integer|exists:NguoiDung,id',
            'IDMentor' => 'nullable|integer|exists:Mentor,id',
            'DiemGPA' => 'nullable|numeric',
            'NoiDung' => 'nullable|string',
        ]);

        // Create a new Mentee record
        $mentee = Mentee::create($request->all());

        return $mentee;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Models\Mentee
     */
    public function show($id)
    {
        // Retrieve and return a specific Mentee record
        return Mentee::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \App\Models\Mentee
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $this->validateIncomingRequest($request, [
            'IDNguoiDung' => 'nullable|integer|exists:NguoiDung,id',
            'IDMentor' => 'nullable|integer|exists:Mentor,id',
            'DiemGPA' => 'nullable|numeric',
            'NoiDung' => 'nullable|string',
        ]);

        // Find the Mentee record to update
        $mentee = Mentee::findOrFail($id);

        // Update Mentee record with new data
        $mentee->fill($request->all())->save();

        return $mentee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the Mentee record to delete
        $mentee = Mentee::findOrFail($id);

        // Delete the Mentee record
        $mentee->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }

    /**
     * Validate incoming request data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @return void
     */
    protected function validateIncomingRequest(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(response()->json(['errors' => $validator->errors()], 422));
        }
    }

    /**
     * Validate pagination parameters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validatePagination(Request $request)
    {
        $request->validate([
            'limit' => 'integer|min:1',
            'page' => 'integer|min:1',
        ]);
    }
}
