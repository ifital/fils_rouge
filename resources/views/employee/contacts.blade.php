
<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Messages de contact</h2>

    @if ($contacts->count())
        <table class="min-w-full bg-white border border-gray-200 shadow-md">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-2 px-4 border">Nom</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">Sujet</th>
                    <th class="py-2 px-4 border">Message</th>
                    <th class="py-2 px-4 border">Reçu le</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr class="text-sm">
                        <td class="py-2 px-4 border">{{ $contact->name }}</td>
                        <td class="py-2 px-4 border">{{ $contact->email }}</td>
                        <td class="py-2 px-4 border">{{ $contact->subject }}</td>
                        <td class="py-2 px-4 border">{{ $contact->message }}</td>
                        <td class="py-2 px-4 border">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    @else
        <p>there is no conntacts.</p>
    @endif
</div>
