import { useState, React } from 'react'
import './Chats.css'
import { RiRefreshLine } from "react-icons/ri";
import { AiOutlineDownload } from "react-icons/ai"
import axios from 'axios'

const Chats = () => {
  const [formData, setFormData] = useState({
      title: '',
      paragraph: '',
  });

  const handleChange = (e) => {
      setFormData({ ...formData, [e.target.name]: e.target.value });
  };
  const functionCall = async (e) => {
    e.preventDefault();
    console.log("It has been clicked");
    // console.log(e.target.cfb`lassName);
  }
  const handleSubmit = async (e) => {
      e.preventDefault(); 
      try {
          const response = await axios.post('http://127.0.0.1:8000/api/project', formData)
          .then(response => console.log(response.data))
          .catch(error => console.error(error));
          // Handle successful registration (e.g., redirect to login)
      } catch (error) {
          console.error(error);
          // Handle registration errors (e.g., display error messages)
      }
  };
  return (
    <div className='chats main-content'>
      <div className="pg">
        <div className="main">
          <div className="toolbar">
            <div className="tools">
              <span>T</span>
              <span>S</span>
              <span>U</span>
              <span>23</span>
            </div>
          </div>
          <div className="inputarea">
            <form className="project-details" onSubmit={handleSubmit}>
              <div className="action">
                <div className="title">
                  <input type="text" id="project_name" value={formData.project_name} onChange={handleChange} name="project_name" placeholder="Enter project name"/>
                  <input type="text" id="project_title" value={formData.project_title} onChange={handleChange} name="project_title" placeholder="Enter title here"/>
                </div>
                <div className="actionbtns">
                  <button>Save</button>
                  <button type="button" className='download' onClick={functionCall}><AiOutlineDownload className='download-btn'/></button>
                  <button type="button" className='refresh' onClick={functionCall}><RiRefreshLine className='refresh-btn'/></button>
                </div>
              </div>
              <textarea id="paragraph" value={formData.paragraph} onChange={handleChange} name="paragraph"></textarea>
            </form>
          </div>
        </div>
        <div className="history">
          <div className="title">History</div>
          <div className='history-list'>
            <li>Listing of component one and two to test the components</li>
            <hr />
            <li>This is the second component</li>
            <hr />
            <li>This is the third component</li>
            <hr />
          </div>
        </div>
      </div>
    </div>
  )
}

export default Chats