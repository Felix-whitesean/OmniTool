import React from 'react'
import './NavBar.css'

const NavBar = () => {
  return (
    <div className='navbar'>
      <div className="properties">
        <div className="name">
          <h1>All of Me</h1>
          <img src="" alt="" />
        </div>
        <div className="top-strip">
          <div className="flex-end">
            <p>Arrow</p>
            <div className="status">
              <div></div>
              <h5>Online</h5>
            </div>
          </div>
        </div>
        <div className="bottom-strip">
          <div className="middle-strip"></div>
        </div>
        <div className="floating">
          <div className="hexagon">
            <div className="face1"></div>
            <div className="face2"></div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default NavBar