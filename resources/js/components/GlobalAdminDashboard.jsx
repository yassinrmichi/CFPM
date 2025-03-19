import React from "react";
import ReactDOM from "react-dom/client";

function GlobalAdminDashboard() {
  return (
    <div>
      <h1>Tableau de bord Global Admin</h1>
      <p>Bienvenue dans l'administration du CFPM.</p>
    </div>
  );
}

export default GlobalAdminDashboard;


const rootElement = document.getElementById("dashboard-root");
if (rootElement) {
  const root = ReactDOM.createRoot(rootElement);
  root.render(
    <React.StrictMode>
      <GlobalAdminDashboard />
    </React.StrictMode>
  );
}
