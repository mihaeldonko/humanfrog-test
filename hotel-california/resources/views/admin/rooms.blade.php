@extends('layouts.app-admin')

@section('content')
<div class="container mt-4">
    <div class="row g-4">
        @foreach ($rooms as $room)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card h-100 shadow-sm">
                    <div class="room-img position-relative">
                        <img src="{{$room['main_image']}}" class="card-img-top" alt="room image">
                        <a id="open-edit-modal" class="icon-overlay" style="cursor: pointer" data-json="{{json_encode($room)}}">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$room['name']}}</h5>
                        <p class="card-text">{{$room['short_description']}}</p>
                        <p class="card-text"><strong>Price per night:</strong> {{$room['price']}} €</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editRoomForm" action="{{ route('updateRoom') }}" method="POST">
                @csrf
                <input type="hidden" id="editRoomId" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editRoomName" class="form-label">Room Name</label>
                        <input type="text" class="form-control" id="editRoomName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRoomDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editRoomDescription" name="short_description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editRoomPrice" class="form-label">Price per Night (€)</label>
                        <input type="number" class="form-control" id="editRoomPrice" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRoomImage" class="form-label">Current Image</label>
                        <img id="editRoomImage" class="img-fluid" alt="Room Image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('#open-edit-modal').forEach(button => {
        button.addEventListener('click', function () {
            const roomData = JSON.parse(this.getAttribute('data-json'));
            
            document.getElementById('editRoomId').value = roomData.id;
            document.getElementById('editRoomName').value = roomData.name;
            document.getElementById('editRoomDescription').value = roomData.short_description;
            document.getElementById('editRoomPrice').value = roomData.price;
            document.getElementById('editRoomImage').src = roomData.main_image;
            
            const modal = new bootstrap.Modal(document.getElementById('editRoomModal'));
            modal.show();
        });
    });

    document.getElementById('editRoomForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        if (response.ok) {
            alert('Room updated successfully!');
            location.reload();
        } else {
            alert('Failed to update room.');
        }
    });
});
</script>
@endsection