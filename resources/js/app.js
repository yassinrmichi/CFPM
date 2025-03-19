import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import GlobalAdminDashboard from './components/GlobalAdminDashboard';

const rootElement = document.getElementById('dashboard-root');

if (rootElement) {
    ReactDOM.createRoot(rootElement).render(
        <React.StrictMode>
            <GlobalAdminDashboard />
        </React.StrictMode>
    );
}
