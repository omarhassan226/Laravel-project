{{-- Delete Confirmation Modal Component --}}
<div id="deleteModal" class="modal-overlay" style="display: none;">
    <div class="modal-box">
        <div class="modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24"
                stroke="#ef4444" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
        </div>
        <h3 class="modal-title">Delete Flight</h3>
        <p class="modal-message">Are you sure you want to delete this flight? This action cannot be undone.</p>
        <div class="modal-actions">
            <button type="button" class="btn-modal btn-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-modal btn-delete">Delete</button>
            </form>
        </div>
    </div>
</div>

<style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.2s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-box {
        background: white;
        border-radius: 16px;
        padding: 32px;
        width: 400px;
        max-width: 90%;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease;
    }

    .modal-icon {
        margin-bottom: 16px;
    }

    .modal-title {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
    }

    .modal-message {
        font-size: 14px;
        color: #64748b;
        margin: 0 0 24px 0;
        line-height: 1.5;
    }

    .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .btn-modal {
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.2s ease;
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }
</style>

<script>
    function openDeleteModal(flightId, flightNumber) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        const message = modal.querySelector('.modal-message');

        form.action = '/flights/' + flightId;
        message.textContent = 'Are you sure you want to delete flight "' + flightNumber +
            '"? This action cannot be undone.';
        modal.style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
