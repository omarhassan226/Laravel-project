{{-- Toast Notification Component --}}
{{-- Works with: 1) Laravel session flash (redirects)  2) AJAX/Fetch requests (auto-intercepted) --}}
{{-- Usage: @include('partials._toast') in your layout (once) --}}
{{-- Controller: return redirect()->with('success', 'Done!') --}}
{{-- JavaScript: showToast('success', 'Done!') --}}

@php
    $toastTypes = ['success', 'error', 'warning', 'info'];
@endphp
<style>
    .toast-container {
        position: fixed;
        top: 24px;
        right: 24px;
        z-index: 999999;
        display: flex;
        flex-direction: column;
        gap: 10px;
        pointer-events: none;
    }

    .custom-toast {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        min-width: 320px;
        max-width: 450px;
        padding: 16px 20px;
        border-radius: 12px;
        background: white;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15), 0 2px 8px rgba(0, 0, 0, 0.08);
        pointer-events: all;
        animation: toastSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }

    .custom-toast.custom-toast-hiding {
        animation: toastSlideOut 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes toastSlideIn {
        from { transform: translateX(120%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes toastSlideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(120%); opacity: 0; }
    }

    /* Progress bar */
    .custom-toast-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        border-radius: 0 0 12px 12px;
        animation: toastProgress 4s linear forwards;
    }

    @keyframes toastProgress {
        from { width: 100%; }
        to { width: 0%; }
    }

    /* Icon */
    .custom-toast-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }

    /* Spinner for loading */
    .custom-toast-spinner {
        width: 16px;
        height: 16px;
        border: 2px solid #cbd5e1;
        border-top-color: #3b82f6;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Content */
    .custom-toast-content {
        flex: 1;
    }

    .custom-toast-title {
        font-size: 14px;
        font-weight: 700;
        margin: 0 0 2px 0;
        color: #1e293b;
    }

    .custom-toast-message {
        font-size: 13px;
        color: #64748b;
        margin: 0;
        line-height: 1.4;
    }

    /* Close button */
    .custom-toast-close {
        background: none;
        border: none;
        cursor: pointer;
        color: #94a3b8;
        padding: 0;
        margin-top: 1px;
        flex-shrink: 0;
        transition: color 0.2s;
    }

    .custom-toast-close:hover {
        color: #475569;
    }

    /* Types */
    .custom-toast-success { border-left: 4px solid #22c55e; }
    .custom-toast-success .custom-toast-icon { background: #dcfce7; color: #16a34a; }
    .custom-toast-success .custom-toast-progress { background: #22c55e; }

    .custom-toast-error { border-left: 4px solid #ef4444; }
    .custom-toast-error .custom-toast-icon { background: #fee2e2; color: #dc2626; }
    .custom-toast-error .custom-toast-progress { background: #ef4444; }

    .custom-toast-warning { border-left: 4px solid #f59e0b; }
    .custom-toast-warning .custom-toast-icon { background: #fef3c7; color: #d97706; }
    .custom-toast-warning .custom-toast-progress { background: #f59e0b; }

    .custom-toast-info { border-left: 4px solid #3b82f6; }
    .custom-toast-info .custom-toast-icon { background: #dbeafe; color: #2563eb; }
    .custom-toast-info .custom-toast-progress { background: #3b82f6; }

    .custom-toast-loading { border-left: 4px solid #8b5cf6; }
    .custom-toast-loading .custom-toast-icon { background: #ede9fe; color: #7c3aed; }

    /* Responsive */
    @media (max-width: 480px) {
        .toast-container {
            right: 12px;
            left: 12px;
            top: 12px;
        }
        .custom-toast {
            min-width: auto;
            max-width: 100%;
        }
    }
</style>

<div id="toastContainer" class="toast-container"></div>

<script>
    const toastIcons = {
        success: `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>`,
        error: `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>`,
        warning: `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>`,
        info: `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>`,
        loading: `<div class="toast-spinner"></div>`
    };

    const toastTitles = {
        success: 'Success',
        error: 'Error',
        warning: 'Warning',
        info: 'Info',
        loading: 'Loading...'
    };

    /**
     * Show a toast notification
     * @param {string} type - 'success' | 'error' | 'warning' | 'info' | 'loading'
     * @param {string} message - The message to display
     * @param {number} duration - Auto-dismiss time in ms (0 = no auto-dismiss, useful for loading)
     * @returns {HTMLElement} The toast element (useful for dismissing loading toasts)
     */
    function showToast(type, message, duration = 2000) {
        const container = document.getElementById('toastContainer');

        const toast = document.createElement('div');
        toast.className = `custom-toast toast-${type}`;

        let progressHtml = duration > 0
            ? `<div class="custom-toast-progress" style="animation-duration: ${duration}ms"></div>`
            : '';
        console.log(toastIcons[type]);
        toast.innerHTML = `
            <div class="custom-toast-icon">${toastIcons[type]}</div>
            <div class="custom-toast-content">
                <p class="custom-toast-title">${toastTitles[type]}</p>
                <p class="custom-toast-message">${message}</p>
            </div>
            <button class="custom-toast-close" onclick="dismissToast(this.parentElement)">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
            ${progressHtml}
        `;

        container.appendChild(toast);

        // Auto-dismiss (skip if duration is 0, e.g. loading toast)
        if (duration > 0) {
            setTimeout(() => {
                dismissToast(toast);
            }, duration);
        }

        return toast;
    }

    function dismissToast(toast) {
        if (!toast || toast.classList.contains('custom-toast-hiding')) return;
        toast.classList.add('custom-toast-hiding');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }

    // ==========================================
    // Global Fetch Interceptor
    // Automatically shows toast on every fetch()
    // ==========================================
    (function () {
        const originalFetch = window.fetch;

        window.fetch = function (...args) {
            const url = typeof args[0] === 'string' ? args[0] : args[0]?.url || '';
            const options = args[1] || {};
            const method = (options.method || 'GET').toUpperCase();

            // Show loading toast for non-GET requests
            let loadingToast = null;
            if (method !== 'GET') {
                loadingToast = showToast('loading', 'Processing request...', 0);
            }

            return originalFetch.apply(this, args)
                .then(response => {
                    // Dismiss loading toast
                    if (loadingToast) dismissToast(loadingToast);

                    // Clone response so we can read body and still return it
                    const cloned = response.clone();

                    // Try to read JSON response for messages
                    cloned.json().then(data => {
                        if (response.ok) {
                            // Show success if server sent a message
                            if (data.message) {
                                showToast('success', data.message);
                            } else if (method !== 'GET') {
                                showToast('success', 'Request completed successfully');
                            }
                        } else {
                            // Show error
                            const errorMsg = data.message || data.error || `Request failed (${response.status})`;
                            showToast('error', errorMsg);
                        }
                    }).catch(() => {
                        // Response is not JSON — still show status for non-GET
                        if (loadingToast) {
                            if (response.ok) {
                                showToast('success', 'Request completed successfully');
                            } else {
                                showToast('error', `Request failed (${response.status})`);
                            }
                        }
                    });

                    return response;
                })
                .catch(error => {
                    // Network error
                    if (loadingToast) dismissToast(loadingToast);
                    showToast('error', 'Network error: ' + error.message);
                    throw error;
                });
        };
    })();

    // ==========================================
    // Laravel Session Flash Messages (on page load)
    // ==========================================
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($toastTypes as $type)
            @if(session($type))
                showToast('{{ $type }}', @json(session($type)));
            @endif
        @endforeach
    });
</script>
