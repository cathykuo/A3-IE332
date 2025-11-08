document.getElementById('loginForm').addEventListener('submit', (e) => {
  e.preventDefault();
  const u = document.getElementById('username').value.trim();
  const p = document.getElementById('password').value.trim();
  if (!u || !p) return;
  alert(`Welcome, ${u}! (Hook up real auth here.)`);
});