<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // For simplicity, allow all requests.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:25000'],
            'user_id' => ['nullable', 'integer', Rule::exists('users', 'id')],
            'client_id' => ['required', 'integer', Rule::exists('clients', 'id')],
            'start_time' => ['required', 'date', 'before_or_equal:end_time'],
            'end_time' => ['required', 'date', 'after_or_equal:start_time'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            if (! $this->user_id || ! $this->start_time || ! $this->end_time) {
                return;
            }

            // Force the dates to Carbon for correct comparison
            $start = Carbon::parse($this->start_time);
            $end = Carbon::parse($this->end_time);

            $overlapExists = Booking::query()
                ->where('user_id', $this->user_id)
                ->where(function ($query) use ($start, $end) {
                    $query->whereBetween('start_time', [$start, $end])
                        ->orWhereBetween('end_time', [$start, $end])
                        ->orWhere(function ($q) use ($start, $end) {
                            $q->where('start_time', '<=', $start)
                                ->where('end_time', '>=', $end);
                        });
                })
                ->exists();

            if ($overlapExists) {
                $validator->errors()->add('start_time', 'This user already has a booking that overlaps with the given time range.');
            }
        });
    }
}
