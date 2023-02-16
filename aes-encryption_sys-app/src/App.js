import React, { useState } from 'react';

function FileInput() {
  const [selectedFile, setSelectedFile] = useState(null);

  const handleFileChange = (event) => {
    setSelectedFile(event.target.files[0]);
  };

  return (
    <div className='file-input'>
      <input type="file" onChange={handleFileChange} />
      {selectedFile ? (
        <p>{selectedFile.name}</p>
      ) : (
        <p>No file selected</p>
      )}
    </div>
  );
}

export default App;