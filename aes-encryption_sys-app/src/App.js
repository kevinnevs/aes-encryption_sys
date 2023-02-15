import React, { useState } from "react";
import logo from './logo.svg';
import './App.css';
import { Login } from "./Login";
import { Register } from "./Register";
import FileUpload from './FileUpload/FileUpload';
import FileList from './FileList/FileList';

function App() {
  const [currentForm, setCurrentForm] = useState('login');
  const [files, setFiles] = useState([])

  const toggleForm = (formName) => {
    setCurrentForm(formName);
  }

  const removeFile = (filename) => {
    setFiles(files.filter(file => file.name !== filename))
  }

  return (
    <div className="App">
      {
        currentForm === "login" ? <Login onFormSwitch={toggleForm} /> : <Register onFormSwitch={toggleForm} />
      }
      <div className="title">Upload file</div>
      <FileUpload files={files} setFiles={setFiles}
        removeFile={removeFile} />
      <FileList files={files} removeFile={removeFile} />
    </div>
  );
}

export default App;