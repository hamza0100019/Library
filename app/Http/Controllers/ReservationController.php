<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('livre')->where('user_id', Auth::id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function tobookview($id)
    {
        $livre = Livre::findOrFail($id);
        return view('tobook.index', compact('livre'));
    }

    public function create(Request $request, $id)
    {
        $livre = Livre::findOrFail($id);
    
        if (!$livre->disponible) {
            return redirect()->back()->with('error', 'Ce livre n\'est pas disponible pour réservation.');
        }
    
        $existingReservation = Reservation::where('user_id', Auth::id())
            ->where('livre_id', $livre->id)
            ->whereIn('etat', ['en_attente', 'validée'])
            ->first();
    
        if ($existingReservation) {
            return redirect()->back()->with('exist', 'Vous avez déjà une réservation active pour ce livre.');
        }
    
        Reservation::create([
            'user_id' => Auth::id(),
            'livre_id' => $id,
            'date_debut' => now(),
            'date_fin' => now()->addDays(7),
            'etat' => 'en_attente',
        ]);
    
        $livre->update(['disponible' => false]);
    
        return redirect()->back()->with('success', '📚 Votre demande de réservation a bien été enregistrée ! Elle sera validée par l\'administration sous peu.');
    }
    

    public function adminIndex()
    {
        $reservations = Reservation::with('livre', 'user')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus($id, $etat)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['etat' => $etat]);

        return redirect()->route('admin.reservations')->with('success', 'État mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations')->with('success', 'Réservation supprimée avec succès.');
    }


    public function download($id)
    {
        $reservation = Reservation::with('livre', 'user')->findOrFail($id);

        $pdf = Pdf::loadView('reservations.receipt', compact('reservation'));
        return $pdf->download('reservation_' . $reservation->id . '.pdf');
    }

    private function sendReservationEmail($reservation)
    {
        $user = $reservation->user;

        Mail::send('emails.reservation', compact('reservation', 'user'), function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Confirmation de votre réservation');
        });
    }

    private function sendValidationEmail($reservation)
    {
        $user = $reservation->user;

        Mail::send('emails.reservation_validated', compact('reservation', 'user'), function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Votre réservation a été validée');
        });
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->etat != 'annulée') {
            $reservation->update(['etat' => 'annulée']);
        }

        return redirect()->route('reservations.index')->with('success', 'Réservation annulée avec succès.');
    }
}
