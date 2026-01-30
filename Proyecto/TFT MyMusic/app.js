// ============================================
// MyMusic's - Main JavaScript Application
// Simplified for multi-page setup
// ============================================

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    loadCurrentUser();
    updateNavigation();
    initializeMusicPlayer();
});

// ============================================
// User Authentication
// ============================================

function loadCurrentUser() {
    const savedUser = localStorage.getItem('currentUser');
    if (savedUser) {
        const user = JSON.parse(savedUser);
        updateNavigationWithUser(user);
    }
}

function saveCurrentUser(user) {
    if (user) {
        localStorage.setItem('currentUser', JSON.stringify(user));
    } else {
        localStorage.removeItem('currentUser');
    }
}

function setAuthMode(mode) {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const title = document.getElementById('authModalTitle');
    const toggle = document.getElementById('authToggle');

    if (mode === 'login') {
        title.textContent = 'Iniciar Sesión';
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        toggle.textContent = '¿No tienes cuenta? Regístrate';
        toggle.setAttribute('onclick', "setAuthMode('register')");
    } else {
        title.textContent = 'Registrarse';
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        toggle.textContent = '¿Ya tienes cuenta? Inicia sesión';
        toggle.setAttribute('onclick', "setAuthMode('login')");
    }
}

function toggleAuthForm() {
    const loginForm = document.getElementById('loginForm');
    const isLogin = loginForm.style.display !== 'none';
    setAuthMode(isLogin ? 'register' : 'login');
}

function demoLogin(type) {
    let demoUser;
    
    if (type === 'artist') {
        demoUser = {
            id: 'artist1',
            name: 'Luna Beats',
            email: 'luna@mymusics.com',
            type: 'artist',
            avatar: 'https://i.pravatar.cc/150?img=1'
        };
    } else if (type === 'admin') {
        demoUser = {
            id: 'admin1',
            name: 'Admin Sistema',
            email: 'admin@mymusics.com',
            type: 'admin',
            avatar: 'https://i.pravatar.cc/150?img=60'
        };
    } else {
        demoUser = {
            id: 'user1',
            name: 'Carlos Música',
            email: 'carlos@mymusics.com',
            type: 'user',
            avatar: 'https://i.pravatar.cc/150?img=12'
        };
    }

    saveCurrentUser(demoUser);
    updateNavigationWithUser(demoUser);
    
    // Close modal
    const authModal = document.getElementById('authModal');
    if (authModal) {
        const modal = bootstrap.Modal.getInstance(authModal);
        if (modal) modal.hide();
    }
    
    showToast(`Bienvenido ${demoUser.name}! (Modo Demo)`, 'success');
    
    // Redirect to appropriate page
    setTimeout(() => {
        if (type === 'artist') {
            window.location.href = 'artist-dashboard.html';
        } else if (type === 'admin') {
            window.location.href = 'admin-panel.html';
        } else {
            window.location.href = 'index.html';
        }
    }, 1000);
}

function logout() {
    saveCurrentUser(null);
    showToast('Sesión cerrada correctamente', 'info');
    setTimeout(() => {
        window.location.href = 'index.html';
    }, 1000);
}

// ============================================
// Navigation
// ============================================

function updateNavigation() {
    const navAuth = document.getElementById('navAuth');
    const navUser = document.getElementById('navUser');
    
    if (navAuth && navUser) {
        const savedUser = localStorage.getItem('currentUser');
        if (savedUser) {
            const user = JSON.parse(savedUser);
            updateNavigationWithUser(user);
        }
    }
}

function updateNavigationWithUser(user) {
    const navAuth = document.getElementById('navAuth');
    const navUser = document.getElementById('navUser');
    const navUserName = document.getElementById('navUserName');
    const navUpload = document.getElementById('navUpload');
    const navDashboard = document.getElementById('navDashboard');
    const navAdmin = document.getElementById('navAdmin');

    if (navAuth && navUser) {
        navAuth.style.display = 'none';
        navUser.style.display = 'block';
        if (navUserName) navUserName.textContent = user.name;

        if (user.type === 'artist') {
            if (navUpload) navUpload.style.display = 'block';
            if (navDashboard) navDashboard.style.display = 'block';
            if (navAdmin) navAdmin.style.display = 'none';
        } else if (user.type === 'admin') {
            if (navUpload) navUpload.style.display = 'none';
            if (navDashboard) navDashboard.style.display = 'none';
            if (navAdmin) navAdmin.style.display = 'block';
        } else {
            if (navUpload) navUpload.style.display = 'none';
            if (navDashboard) navDashboard.style.display = 'none';
            if (navAdmin) navAdmin.style.display = 'none';
        }
    }
}

// ============================================
// Music Player
// ============================================

let isPlaying = false;
let currentTrack = null;

function initializeMusicPlayer() {
    const player = document.getElementById('musicPlayer');
    if (player) {
        // Player is initialized but hidden
    }
}

function togglePlay() {
    isPlaying = !isPlaying;
    const playBtn = document.getElementById('playBtn');
    if (playBtn) {
        const icon = playBtn.querySelector('i');
        if (icon) {
            icon.className = isPlaying ? 
                'bi bi-pause-circle-fill fs-3' : 
                'bi bi-play-circle-fill fs-3';
        }
    }
}

// ============================================
// Toast Notifications
// ============================================

function showToast(message, type = 'info') {
    // Create toast container if it doesn't exist
    let toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toastContainer';
        toastContainer.style.cssText = 'position: fixed; top: 80px; right: 20px; z-index: 9999;';
        document.body.appendChild(toastContainer);
    }

    const toastId = 'toast_' + Date.now();
    const bgClass = type === 'success' ? 'bg-success' : 
                    type === 'danger' ? 'bg-danger' :
                    type === 'warning' ? 'bg-warning' : 'bg-info';

    const toastHTML = `
        <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0 mb-2" role="alert">
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;

    toastContainer.insertAdjacentHTML('beforeend', toastHTML);
    
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
    toast.show();

    toastElement.addEventListener('hidden.bs.toast', function() {
        toastElement.remove();
    });
}

// ============================================
// Form Handlers
// ============================================

// Handle login form submission
document.addEventListener('submit', function(e) {
    if (e.target.id === 'loginForm') {
        e.preventDefault();
        showToast('Función de login - Usa el acceso demo', 'info');
    } else if (e.target.id === 'registerForm') {
        e.preventDefault();
        showToast('Función de registro - Usa el acceso demo', 'info');
    }
});
