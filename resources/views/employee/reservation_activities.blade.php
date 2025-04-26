<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Gestion des réservations d'activités</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-header">
            <h3>Liste des réservations</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Activité</th>
                        <th>Date</th>
                        <th>Nb. personnes</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->activity->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                            <td>{{ $reservation->number_of_people }}</td>
                            <td>{{ number_format($reservation->price, 2) }} €</td>
                            <td>
                                <span class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $reservation->id }}">
                                    <i class="fas fa-edit"></i> Modifier
                                </button>
                                
                                <form action="{{ route('employee.reservations.activities.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        <!-- Modal pour modifier la réservation -->
                        <div class="modal fade" id="editModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $reservation->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $reservation->id }}">Modifier la réservation #{{ $reservation->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('employee.reservations.activities.update', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="activity" class="form-label">Activité</label>
                                                <input type="text" class="form-control" id="activity" value="{{ $reservation->activity->name }}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="reservation_date" class="form-label">Date de réservation</label>
                                                <input type="date" class="form-control" id="reservation_date" name="reservation_date" value="{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('Y-m-d') }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="number_of_people" class="form-label">Nombre de personnes</label>
                                                <input type="number" class="form-control" id="number_of_people" name="number_of_people" min="1" max="10" value="{{ $reservation->number_of_people }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Statut</label>
                                                <select class="form-select" id="status" name="status">
                                                    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                                    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                                                    <option value="canceled" {{ $reservation->status == 'canceled' ? 'selected' : '' }}>Annulée</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucune réservation trouvée</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>