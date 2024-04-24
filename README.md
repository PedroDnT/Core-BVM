# Web App Deployment with Health Check

This project is a web application that includes a health check endpoint and is configured for deployment on Vercel.

## Getting Started

To get started with this project, clone the repository and install the dependencies.

```bash
git clone <repository-url>
cd <repository-name>
npm install
```

## Running the Application

To run the application in development mode, use the following command:

```bash
npm start
```

This will start the React application and you can view it in the browser at `http://localhost:3000`.

## Health Check

The health check endpoint is located at `/api/health` and can be accessed via the `API_URL` environment variable defined in `.env.production`.

## Deployment

The application is configured for deployment on Vercel. To deploy the application, make sure you have the Vercel CLI installed and run:

```bash
vercel deploy
```

## Environment Variables

Before deploying the application, make sure to set up the environment variables in `.env.production`:

- `REACT_APP_VERCEL_ENV`: Set this to the environment you are deploying to (e.g., `production`).
- `API_URL`: The URL of the health check API.

## Project Structure

- `api/health.js`: Contains the health check API endpoint.
- `vercel.json`: Configuration for Vercel deployment.
- `.env.production`: Environment variables for production.
- `package.json`: Defines the project dependencies and scripts.
- `public/index.html`: The HTML template for the React application.
- `src/App.js`: The main React component.
- `src/index.js`: The entry point for the React application.
- `src/components/Navbar.js`: The navigation bar component.
- `src/components/Footer.js`: The footer component.
- `src/styles/global.css`: Global styles for the application.
- `.gitignore`: Specifies intentionally untracked files to ignore.

## Scripts

- `start`: Starts the development server.
- `build`: Builds the app for production to the `build` folder.
- `deploy`: Deploys the application to Vercel (requires Vercel CLI).

## Contributing

Contributions are welcome! Please read the contributing guidelines before submitting pull requests.

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.