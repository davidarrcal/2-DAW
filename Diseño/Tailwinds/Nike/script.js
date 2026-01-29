const themeToggleBtn = document.getElementById('theme-toggle');
const htmlElement = document.documentElement;

// Función para aplicar el tema
const applyTheme = (theme) => {
  htmlElement.setAttribute('data-theme', theme);
  localStorage.setItem('theme', theme);
};

// Al cargar: prioridad al guardado, luego al sistema, luego claro por defecto
const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
  applyTheme(savedTheme);
} else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
  applyTheme('dark');
}

themeToggleBtn.addEventListener('click', () => {
  const currentTheme = htmlElement.getAttribute('data-theme');
  const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
  applyTheme(newTheme);
});