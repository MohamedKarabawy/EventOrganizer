<?php
namespace App\Services;

use App\Models\RSVP;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AttendanceInviteService
{
    public function associateUsersWithEvent(int $eventId, array $userIds)
    {
        DB::beginTransaction();

        try {
            // Find the event by ID
            $event = Event::findOrFail($eventId);
            $users = User::whereIn('id', $userIds)->get();

            $rsvps = [];
            
            foreach ($users as $user) 
            {
                // Change the status to one of the existing enum values
                $rsvps[] = [
                    'event_id' => $eventId,
                    'user_id' => $user->id,
                    'status' => 'pending', 
                ];
            }

            // Insert or update RSVP records (if a user already has a record for the event, we update it)
            foreach ($rsvps as $rsvpData) 
            {
                RSVP::updateOrCreate(
                    ['event_id' => $rsvpData['event_id'], 'user_id' => $rsvpData['user_id']],
                    ['status' => $rsvpData['status']]
                );
            }

            DB::commit();

            return ['message' => 'Users successfully associated with the event.'];
        } catch (\Exception $e) {
            DB::rollBack();

            return ['error' => 'An error occurred while associating users with the event.', 'details' => $e->getMessage()];
        }
    }
}
