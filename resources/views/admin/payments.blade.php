<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Liste des paiements</h1>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Client</th>
                <th class="px-4 py-2">Chambre</th>
                <th class="px-4 py-2">Montant</th>
                <th class="px-4 py-2">Méthode</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $payment->id }}</td>
                    <td class="px-4 py-2">{{ $payment->reservation->user->name ?? '-' }}</td>
                    <td class="px-4 py-2">#{{ $payment->reservation->room->room_number ?? '-' }}</td>
                    <td class="px-4 py-2">{{ number_format($payment->amount, 2) }} MAD</td>
                    <td class="px-4 py-2 capitalize">{{ $payment->payment_method }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded-full text-xs
                            {{ $payment->status == 'paid' ? 'bg-green-200 text-green-800' :
                               ($payment->status == 'pending' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">{{ $payment->payment_date->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $payments->links() }}
    </div>
</div>
</body>
</html>