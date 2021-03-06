<?php namespace Kevupton\Timetables;

use Kevupton\Ethereal\Models\Ethereal;

class TimetableBooking extends Ethereal {
    // table name
    protected $table = 'timetable_bookings';

    // validation rules
    public static $rules = array(
        'timetable_id' => 'required|integer|exists:timetables,id',
        'for_id' => 'required|integer',
        'for_type' => 'required|string|max:128',
        'from' => 'required|date',
        'to' => 'required|date'
    );

    protected $fillable = array(
        'timetable_id', 'for_id', 'for_type', 'from', 'to'
    );

    public static $relationsData = array(
        'for' => array(self::MORPH_TO),
        'timetable' => array(self::BELONGS_TO, Timetable::class)
    );
}
